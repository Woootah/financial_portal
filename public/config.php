<?php
    define('PAYMONGO_SECRET_KEY', 'sk_test_i8M4Wc31Gt5gpJwNpdr1U6Yp');
    
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "financial_portal";

    $conn = new mysqli($server, $username, $password, $database);

    if($conn->connect_error){
        die("Connection Failed" . $conn->connect_error);
    }

    // echo "Connected Successfully!";
?>
