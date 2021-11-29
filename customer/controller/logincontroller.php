<?php

    if(isset($_POST["loginuseremail"]) || isset($_POST["loginPassword"])){
        $email = $_POST["loginuseremail"];
        $password = $_POST["loginPassword"];
        $customerinfor = [];
        require "../dbconnect/DBConnect.php";

        $db = new DBConnect();
        $dbconnect = $db->connect();

        $sql = $dbconnect->prepare("
            SELECT customer_id,email,password FROM cusaccount
            WHERE email LIKE :email; 
        ");
        $sql->bindValue(":email",$email);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);

        if(count($result) == 1 && $result["0"]["email"] == $email){
            if($result["0"]["password"] == $password){
                $customerinfor += ["login" => true];
            }else{
                $customerinfor += ["login" => "wrong password"];
            }
        }else{
            $customerinfor += ["login" => "your gmail does not exit"];
        }

        if (count($result)>0){
            $sql = $dbconnect->prepare("
                SELECT * FROM customer_lists
                WHERE customer_id = :customerid;
            ");
            $sql->bindValue(":customerid",$result["0"]["customer_id"]);
            $sql->execute();
            $customerdata = $sql->fetchAll(PDO::FETCH_ASSOC);
            array_push($customerinfor,$customerdata);
        }

        print_r(json_encode($customerinfor));
    }