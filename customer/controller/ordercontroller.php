<?php

if(isset($_POST["send"])) {
    require "../dbconnect/DBConnect.php";

    //call DB class
    $db = new DBConnect();
    $dbconnect = $db->connect();

    $returndata = [];

//    check server maintenance
    $sql = $dbconnect->prepare(" SELECT checks FROM settings WHERE setting = 'maintenance' ;");
    $sql->execute();
    $server = $sql->fetchAll(PDO::FETCH_ASSOC);
    $returndata += $server["0"];

    if ($server["0"]["checks"] == 0) {
        $showorder = json_decode($_POST["send"], true);
        $work = false;
        $quantitys = 0;
        $itemlength = count(array_values($showorder["items"]));

        $quantityarr = [];
        $leftquantity = 0;

        for ($i = 0; $i < $itemlength - 1; $i++) {
            $pname = $showorder["items"][$i]["pname"];
            $quantitys += $showorder["items"][$i]["quantity"];
            $pid = $showorder["items"][$i]["pid"];
            $quantity = $showorder["items"][$i]["quantity"];

//            check stock from database
            $sql = $dbconnect->prepare("
                SELECT quantity FROM m_product
                WHERE p_id = :pid;
            ");
            $sql->bindValue(":pid", $pid);
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            if ($result["0"]["quantity"] >= $quantity) {
                $work = true;
            } else {
                $work = false;
                $returndata += ["pname" => $pname];
                $returndata += ["laststock" => $result["0"]["quantity"]];
                $returndata += ["buy" => $work];
                $returndata += ["buyid" => $i];
                json_encode($returndata);
                break;
            }
        }

        //check buy
        if ($work) {
            $id = $showorder["id"];
            if ($id == "") {

                //insert customer_lists table
                $sql = $dbconnect->prepare("
                    INSERT INTO customer_lists(
                        name,
                        email,
                        phone,
                        address,
                        membership,
                        total_orders,
                        d_flag
                    )
                    VALUES(
                        :name,
                        :email,
                        :phone,
                        :address,
                        :membership,
                        :total_orders,
                        :d_flag
                    );
                ");
                $sql->bindValue(":name", $showorder["name"]);
                $sql->bindValue(":email", $showorder["email"]);
                $sql->bindValue(":phone", $showorder["phone"]);
                $sql->bindValue(":address", $showorder["address"]);
                $sql->bindValue(":membership", "0");
                $sql->bindValue(":total_orders", $quantitys);
                $sql->bindValue(":d_flag", 0);
                $sql->execute();

                //insert orders table
                $sql = $dbconnect->prepare("
                    INSERT INTO orders(
                        customer_id ,
                        total_price,
                        del_flag,
                        buy_date,
                        create_date
                    )
                    VALUES(
                        (SELECT MAX(customer_id) FROM customer_lists),
                        :total_price,
                        :del_flag,
                        :buy_date,
                        :create_date
                    );
                ");
                $sql->bindValue(":total_price", $showorder["totalprice"]);
                $sql->bindValue(":del_flag", 0);
                $sql->bindValue(":buy_date", date("Y/m/d"));
                $sql->bindValue(":create_date", date("Y/m/d"));
                $sql->execute();

            } else {

                //update customer lists table
                $sql = $dbconnect->prepare("
                    UPDATE customer_lists
                    SET address = :address
                    WHERE customer_id = :id;
                ");
                $sql->bindValue(":address", $showorder["address"]);
                $sql->bindValue(":id", $showorder["id"]);
                $sql->execute();

                //insert orders table
                $sql = $dbconnect->prepare("
                    INSERT INTO orders(
                        customer_id ,
                        total_price,
                        del_flag,
                        buy_date,
                        create_date
                    )
                    VALUES(
                        :custoemr_id,
                        :total_price,
                        :del_flag,
                        :buy_date,
                        :create_date
                    );
                ");
                $sql->bindValue(":custoemr_id", $showorder["id"]);
                $sql->bindValue(":total_price", $showorder["totalprice"]);
                $sql->bindValue(":del_flag", 0);
                $sql->bindValue(":buy_date", date("Y/m/d"));
                $sql->bindValue(":create_date", date("Y/m/d"));
                $sql->execute();

            }

            //    insert order_details table
            for ($x = 0; $x < $itemlength - 1; $x++) {
                $quantityarr += [$showorder["items"][$x]["pid"] => $showorder["items"][$x]["quantity"]];
                $sql = $dbconnect->prepare("
                INSERT INTO order_details(
                                          order_id,
                                          product_id,
                                          quantity,
                                          create_date,
                                          total_price,
                                          del_flag
                )
                VALUES(
                       (SELECT MAX(order_id) FROM orders),
                       :product_id,
                       :quantity,
                       :create_date,
                       :total_price,
                       :del_flag
                );
            ");
                $sql->bindValue(":product_id", $showorder["items"][$x]["pid"]);
                $sql->bindValue(":quantity", $showorder["items"][$x]["quantity"]);
                $sql->bindValue(":create_date", date("Y/m/d"));
                $sql->bindValue(":total_price", $showorder["items"][$x]["price"]);
                $sql->bindValue(":del_flag", 0);
                $sql->execute();
            }

            //update quantity from m_product
            foreach ($quantityarr as $key => $value) {
                //get product quantity from database
                $sql = $dbconnect->prepare("
                    SELECT quantity FROM m_product
                    WHERE p_id = :id;
                ");
                $sql->bindValue(":id", $key);
                $sql->execute();
                $result = $sql->fetchAll(PDO::FETCH_ASSOC);

                $leftquantity = $result["0"]["quantity"] - $value;

                //update quantity
                $sql = $dbconnect->prepare("
                    UPDATE m_product
                    SET quantity = :leftquantity
                    WHERE p_id = :pid;
                ");
                $sql->bindValue(":leftquantity", $leftquantity);
                $sql->bindValue(":pid", $key);
                $sql->execute();
            }

            if ($id == "") {
                //select max(customer_id) for rating table
                $sql = $dbconnect->prepare(" SELECT MAX(customer_id) AS 'customerid' FROM customer_lists; ");
                $sql->execute();
                $result = $sql->fetchAll(PDO::FETCH_ASSOC);
                $returndata += $result;
            }
            print_r(json_encode($returndata));
        } else {
            print_r(json_encode($returndata));
        }
    }else{
        print_r(json_encode($returndata));
    }
}