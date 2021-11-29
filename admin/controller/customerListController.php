<?php

require_once "../dbconnect/dbConnection.php";

//call DB class
$db = new DBConnect();
$dbconnect = $db->connect();


$sql = $dbconnect->prepare("
SELECT
   c.name,
   c.email,
   c.phone,
   c.address,
   c.membership,
   o.total_price,
   r.rating,
   r.feedback
FROM
    customer_lists AS c
INNER JOIN orders AS o
ON
    c.customer_id = o.customer_id
LEFT JOIN m_rating AS r
ON
    c.customer_id = r.customer_id

ORDER BY c.customer_id
");


$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);





?>