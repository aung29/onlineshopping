<?php
    if(isset($_GET['data'])) {
        $data = json_decode($_GET['data']);
        if(count($data) > 0) {
            $result = $_GET['data'];
            require "../resources/multiple page/checkOut.php";
        }else{
            echo "no data";
        }
    }
    else{
        echo "Not available";
    }
