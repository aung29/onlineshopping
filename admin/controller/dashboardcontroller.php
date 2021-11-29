<?php

require_once "../dbconnect/dbConnection.php";


$db = new DBConnect();
$dbconnect = $db->connect();


$sql = $dbconnect->prepare("SELECT Sum(total_price) as total FROM orders ");


$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);


 $total_sales = $result[0]["total"] ;

    // select from total product
 $sql = $dbconnect ->prepare("SELECT Sum(quantity) as count1 FROM m_product");
 $sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);
 
$count1 = $result[0]['count1'];

    // select from order_detail count
$sql = $dbconnect ->prepare("SELECT Sum(quantity) as count2 FROM order_details");
 $sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);

$count2 = $result[0]['count2'];

    // select initial price from m-proudct
$sql = $dbconnect ->prepare("SELECT Sum(initPrice) as intPrice FROM m_product");
 $sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);

$total_initPrice = $result[0]['intPrice'];
// echo $total_initPrice;
// echo "<br>";

// total quantity
$total_count  = $count1 + $count2;
// echo $total_count;

// total cost

$total_costs = $total_initPrice * $total_count;




   
