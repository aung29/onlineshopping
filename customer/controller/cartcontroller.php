<?php
    if(isset($_POST["send"])){
        $data = [];
        $datas = [];
        $quantity = json_decode($_POST["send"]);

        require "../dbconnect/DBConnect.php";

//        call DB
        $db = new DBConnect();
        $dbconnect = $db->connect();

        for($i = 0 ;$i < count($quantity) ; $i++){
            $pid = $quantity[$i]->pid;
            $buyquantity = $quantity[$i]->quantity;

            $sql = $dbconnect->prepare("
                SELECT quantity FROM m_product
                WHERE p_id = '$pid';
            ");
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            array_push($datas,$result["$i"]);
//            if($result["0"]["quantity"] > $buyquantity){
//                global $pid,$buyquantity;
//                $data += [ "pid"=>$quantity[$i]->pid ];
//                $data += [ "stock"=>$result[$i]["0"]["quantity"] ];
//                $data += ["buy"=>"true"];
//                array_push($datas,$data);
//            }else{
//                $data += [ "pid"=>$pid,"stock"=>$result["0"]["quantity"],"buy"=>"false"];
//                array_push($datas,$data);
//            }
        }
        print_r($datas);

    }else{
        echo "not ok";
    }