<?php

require_once "../dbconnect/dbConnection.php";



    $db = new DBConnect();
    $dbconnect = $db->connect();

    // print_r($_POST);
    
    if(isset($_POST['name']) == ""){
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
     
   	ORDER BY c.customer_id" );

        // $sql->bindValue(":name","$name%");
        
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);

     

    }else{
        $name = $_POST['name'];

        // echo $name;
   
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
     
   	WHERE c.name LIKE '$name%'" );

        // $sql->bindValue(":name","$name%");
        
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
        // print_r($result);
    }
    // SELECT * FROM customer_lists WHERE name LIKE '$name%'