<?php 
session_start();
include "db.php";

$id;
$pet = $_POST['pet'];
$vax = $_POST['medicine'];
$date = $_POST['date'];



$sqli ="SELECT * FROM `petdetails` WHERE pet_name = '{$pet}'";
$resultset = mysqli_query($conn, $sqli);
    while( $rows = mysqli_fetch_assoc($resultset) ) {
        $id = $rows["pet_id"];
    }

$sql="INSERT INTO medication(`pet_id`,`medicine`,`date`) VALUES ('$id','$vax','$date')";

if($conn->query($sql)===TRUE){
    echo '<script>alert("Success")</script>';
    header("Location:../admin.php");
    
}

?>