<?php

    require "../dbconnect/dbConnection.php";


    $db = new DBConnect();
    $dbconnect = $db->connect();


    $sql = $dbconnect->prepare("SELECT * FROM m_adminlogin");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    // print_r($result);
   
    if(isset($_POST['submit'])){
        $username = $_POST['name'];
        $password = $_POST['password'];
        
        foreach($result as $key  => $value){
            if($username == $value['name'] && $password == $value['password']){
                header("Location: ../adminpage/dashboard.php");
            }else{
                header("Location: ../adminLogin.php");
            }

        }

    
    }






    




