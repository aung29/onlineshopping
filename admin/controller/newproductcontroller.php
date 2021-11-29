<?php

//  echo $_FILES['productimage']['name'];
require "../dbconnect/dbConnection.php";

// check for form add product
if(isset($_POST['productname'])){

    $pname = $_POST['productname'];
    $category = $_POST['category'];
    $pid = $_POST['productid'];
    $saleprice = $_POST['productprice'];
    $initprice = $_POST['productinitprice'];
    $rating = $_POST['productrating'];
    $stock = $_POST['quantity'];
    // $pimage = $_POST['productimage'];
    $pdesc = $_POST['productdesc'];


       
    $file = $_FILES['productimage']['name'];
    $location = $_FILES['productimage']['tmp_name']; 
    $extension = pathinfo($file)['extension'];
    $filename = pathinfo($file)['filename'];
    if(move_uploaded_file($location,"../../upload/".$filename.".".$extension)){ 
          echo "ok";
    } else{
            echo "Not Ok";
    }
    
   
    //  db call

    $db = new DBConnect();
    $dbconnect = $db->connect();

    // prepare for insert
    $sql = $dbconnect->prepare(
        "INSERT INTO M_Product
        (
        name,
        category,
        p_id,
        salePrice,
        initPrice,
        rating,
        quantity,
        image,
        description,
        del_flg,
        create_date
        )
        VALUES
        (
        :name,
        :category,
        :p_id,
        :salePrice,
        :initPrice,
        :rating,
        :quantity,
        :image,
        :description,
        :del_flg,
        :create_date
        )"
    );

    //bind value
    $sql->bindValue(":name",$pname);
    $sql->bindValue(":category",$category);
    $sql->bindValue(":p_id",$pid);
    $sql->bindValue(":salePrice",$saleprice);
    $sql->bindValue(":initPrice",$initprice);
    $sql->bindValue(":rating",$rating);
    $sql->bindValue(":quantity",$stock);
    $sql->bindValue(":image",$filename.".".$extension);
    $sql->bindValue(":description",$pdesc);
    $sql->bindValue(":del_flg",0);
    $sql->bindValue(":create_date",date('Y/m/d')); //2021/11/10


    // //run sql
    $sql->execute();

    // require "newproductcontroller.php";
}else{
    print_r($_POST);
}
