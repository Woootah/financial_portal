<?php
    include "./config.php";

    $newbalance = $_POST['newBalance'];
    $id = $_POST['id'];

    $result = $conn->query("UPDATE `users` SET `balance` = $newbalance WHERE student_id ='$id'");


    echo $result == 1 ? "Updated Student: " .$id. "'s balance" : "Failed to update balance";

?>
