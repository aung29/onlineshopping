<?php

if (isset($_POST["send"])) {
    $data = json_decode($_POST["send"], true);
    $femail = $data["femail"];
    $fphone = $data["fphone"];
    $count = $data["count"];
    if ($count != 3) {
        require "../dbconnect/DBConnect.php";

        // call db 
        $db = new DBConnect();
        $dbconnect = $db->connect();

        $sql = $dbconnect->prepare("
            SELECT customer_id FROM customer_lists
            WHERE  email = :email AND phone = :phone;
        ");
        $sql->bindValue(":email", $femail);
        $sql->bindValue(":phone", $fphone);
        $sql->execute();

        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($result));
    } else {
        print_r(json_encode(0));
    }
}
