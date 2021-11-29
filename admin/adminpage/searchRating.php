<?php

 //db call

 $db = new DBConnect();
 $dbconnect = $db->connect();

  // prepare for insert
  $sql = $dbconnect->prepare("SELECT * FROM m_rating");
  $sql->execute();
  $result = $sql->fetchAll(PDO::FETCH_ASSOC);


