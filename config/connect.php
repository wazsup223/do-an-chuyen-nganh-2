<?php 
    $servername = "localhost"; 
    $username = "root"; 
    $password = "";
    $dbname = "ban-dt"; 

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Kết nối đến MySQL thất bại: " . $conn->connect_error);
        $conn->close();
    }
?>