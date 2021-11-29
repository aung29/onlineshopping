<?php

if (isset($_POST["send"])) {
    $data = json_decode($_POST["send"], true);
    $id = $data["id"];
    $pwd = $data["pwd"];

    require "../dbconnect/DBConnect.php";

    $db = new DBConnect();
    $dbconnect = $db->connect();

    $sql = $dbconnect->prepare("
        UPDATE cusaccount
        SET password = :pwd
        WHERE customer_id = :id;
    ");
    $sql->bindValue(":pwd", $pwd);
    $sql->bindValue(":id", $id);
    $sql->execute();
}
