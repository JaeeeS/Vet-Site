<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname ="vetcare";
    $conn = new mysqli($servername, $username, $password,$dbname);
    
    if(!$conn){
        echo "Connection Failed";
    }                               
?>
