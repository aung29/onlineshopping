<?php

require "../dbconnect/dbConnection.php";


$db = new DBConnect();
$dbconnect = $db->connect();

if(isset($_POST['name']) == "0"){
    
    $sql = $dbconnect->prepare("SELECT * FROM m_product ");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    // print_r($result);
    
}
else{
    $value = $_POST['name'];
    
    $sql = $dbconnect->prepare("SELECT * FROM m_product WHERE category=:category");
    
    $sql->bindValue(":category",$value);
    
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
    // echo $value;
}


// print_r($result);

