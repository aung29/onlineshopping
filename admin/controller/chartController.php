<?php

require "../dbconnect/dbConnection.php";


$db = new DBConnect();
$dbconnect = $db->connect();

$lastWeek = date("Y/m/d", strtotime("-6 days"));
$today = date("Y/m/d");
// echo $lastWeek;
// echo $today;
$sql = $dbconnect->prepare("SELECT buy_date,total_price FROM orders WHERE buy_date between :from AND :to ");

$sql->bindValue(":from",$lastWeek);
$sql->bindValue(":to",$today);

$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);



// number of unit sold

// $lastMonth = date("Y/m/d",strtotime("-2 months"));
// $thisMonth = date("Y/m/d");
// echo $lastMonth ;
// echo "<br/>";
// echo $thisMonth;
// echo "<br/>";

// $sql = $dbconnect->prepare("SELECT buy_date,total_price FROM order WHERE buy_date between :from AND :to ");


// $sql->bindValue(":from",$lastMonth);
// $sql->bindValue(":to",$thisMonth);

// $sql->execute();
// $result = $sql->fetchAll(PDO::FETCH_ASSOC);

// echo json_encode($result);



// number of units sold

