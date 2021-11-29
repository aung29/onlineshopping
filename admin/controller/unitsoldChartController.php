<?php





require "../dbconnect/dbConnection.php";


$db = new DBConnect();
$dbconnect = $db->connect();


$sql = $dbconnect->prepare("SELECT
od.product_id,
SUM(od.quantity) as quantity,
pd.name
FROM
order_details AS od
RIGHT JOIN m_product AS pd
ON
od.product_id = pd.p_id
GROUP BY
pd.name
");



$sql->execute();
$result1 = $sql->fetchAll(PDO::FETCH_ASSOC);

// echo json_encode($result1);

// echo "<br/>";


$sql = $dbconnect->prepare("SELECT od.product_id,SUM(od.quantity) as quantity,pd.name
FROM order_details AS od
 INNER JOIN m_product as pd
 ON  od.product_id = pd.p_id
 GROUP BY od.product_id
 ORDER BY  quantity DESC
 LIMIT 4;
");



$sql->execute();
$result2 = $sql->fetchAll(PDO::FETCH_ASSOC);

// echo json_encode($result2);


$array = [
    "array1" => $result1,
    "array2" => $result2
];
echo json_encode($array);


// SELECT od.product_id,SUM(od.quantity),pd.name
// FROM order_details AS od
// INNER JOIN m_product as pd
// ON  od.product_id = pd.p_id
// GROUP BY od.product_id
