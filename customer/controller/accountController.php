<?php

    require "../dbconnect/DBConnect.php";

    if(isset($_POST['singupusername']) || isset($_POST['singupemail']) || isset($_POST['singupphnumber']) || isset($_POST['singuppassword'])){

        $username = $_POST['singupusername'];
        $email = $_POST['singupemail'];
        $phnumber = $_POST['singupphnumber'];
        $password = $_POST['singuppassword'];

        //call DB class
        $db = new DBConnect();
        $dbconnect = $db->connect();

        $sql = $dbconnect->prepare("
            SELECT customer_id FROM cusaccount
            WHERE email = :email;
        ");
        $sql->bindValue(":email" ,$email);
        $sql->execute();
        $id = $sql->fetchAll(PDO::FETCH_ASSOC);

        print_r(count($id));
        if(count($id) != 1) {
            //    insert customer_lists table
            $sql = $dbconnect->prepare("
                INSERT INTO customer_lists(
                    name,
                    phone,
                    email,
                    membership,
                    d_flag
                )
                VALUES(
                    :name,
                    :phone,
                    :email,
                    :membership,
                    :d_flag
                );
            ");
            $sql->bindValue(":name", $username);
            $sql->bindValue(":phone", $phnumber);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":membership", "1");
            $sql->bindValue(":d_flag", 0);
            $sql->execute();

            // insert account table
            $sql = $dbconnect->prepare("
                INSERT INTO cusaccount(
                    customer_id ,
                    email,
                    password,
                    del_flag,
                    create_date
                )
                VALUES(
                    (SELECT MAX(customer_id) FROM customer_lists),
                    :email,
                    :password,
                    :del_flag,
                    :create_date
                );
            ");
            $sql->bindValue(":email", $email);
            $sql->bindValue(":password", $password);
            $sql->bindValue(":del_flag", 0);
            $sql->bindValue(":create_date", date("Y/m/d"));
            $sql->execute();
        }
    }else{
        echo "no";
    }








    




