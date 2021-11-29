<?php

    $data = json_decode($_POST["send"],true);

    $email = $data["loginuseremail"];
    $password = $data["loginPassword"];
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


    $sql = $dbconnect->prepare("
                  SELECT * FROM customer_lists
                  WHERE customer_id = :customerid;
            ");
    $sql->bindValue(":customerid",$result["0"]["customer_id"]);
    $sql->execute();
    $customerdata = $sql->fetchAll(PDO::FETCH_ASSOC);
    array_push($customerinfor,$customerdata);

    print_r(json_encode($customerinfor));