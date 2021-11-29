<?php

 // check for form add product
    if(isset($_POST["send"])){
        $feedbackdata = json_decode($_POST["send"],true);

        require "../dbconnect/DBConnect.php";

        //  db call
        $db = new DBConnect();
        $dbconnect = $db->connect();

        // prepare for insert
        $sql = $dbconnect->prepare(
            "INSERT INTO m_rating
            (
                name,
                feedback,
                rating,
                rating_date,
                customer_id
            )
            VALUES
            (
                :name,
                :feedback,
                :rating,
                :rating_date,
                :customer_id
            );
            "
        );

        //bind value
        $sql->bindValue(":name",$feedbackdata["name"]);
        $sql->bindValue(":feedback",$feedbackdata["feedback"]);
        $sql->bindValue(":rating",$feedbackdata["stars"]);
        $sql->bindValue(":rating_date",date('Y/m/d')); //2021/11/10
        $sql->bindValue(":customer_id",$feedbackdata["customerid"]);
        //run sql
        $sql->execute();
    }else{
    echo "no";
    }

?>