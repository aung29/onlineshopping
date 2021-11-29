<?php
    require "./dbconnect/DBConnect.php";

    $db = new DBConnect();
    $dbconnect = $db->connect();

    $sql = $dbconnect->prepare(" SELECT checks FROM settings WHERE setting = 'maintenance' ;");
    $sql->execute();
    $server = $sql->fetchAll(PDO::FETCH_ASSOC);

//    server maintenance check
    if($server["0"]["checks"] == 0){
        $sql = $dbconnect->prepare("
            SELECT * FROM m_product
            WHERE quantity > 0 AND del_flg = 0;
        ");
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);

        require "resources/multiple page/mainPage.php";
    }else{
        require "server/maintenance.php";
    }