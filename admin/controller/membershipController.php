<?php

require "../dbconnect/dbConnection.php";

//call DB class
$db = new DBConnect();
$dbconnect = $db->connect();


$sql = $dbconnect->prepare("
SELECT
   ca.email,
   ca.create_date,
   c.name,
   c.phone,
   c.membership,
   r.rating,
   r.feedback
FROM
    cusaccount AS ca
INNER JOIN  customer_lists AS c
ON
    ca.customer_id = c.customer_id
LEFT JOIN  m_rating AS r
ON
	ca.customer_id = r.customer_id
ORDER BY ca.customer_id
");


$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);





?>