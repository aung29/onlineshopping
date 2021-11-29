<?php

require_once "../dbconnect/dbConnection.php";

//call DB class
$db = new DBConnect();
$dbconnect = $db->connect();

if(isset($_POST['name'])){
    
    $name = $_POST['name'];
    $sql = $dbconnect->prepare("

    SELECT
    o.order_id,
    c.name AS customer_name,
    p.name,
    od.quantity,
    od.total_price,
    o.total_price AS grandPrice,
    o.buy_date

FROM
    orders AS o

RIGHT JOIN order_details AS od
ON
    o.order_id = od.order_id

INNER JOIN customer_lists AS c 
ON 
    c.customer_id = o.customer_id

INNER JOIN m_product AS p
ON
    p.p_id = od.product_id

    HAVING customer_name LIKE '$name%'
");

$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}

?>