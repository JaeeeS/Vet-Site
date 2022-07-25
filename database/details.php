<?php 
session_start();
include "db.php";
$logID;
$owner = $_POST['owner'];
$pet = $_POST['pet'];
$vet = $_POST['vet'];



$sqli ="SELECT * FROM `login` WHERE username = '{$owner}'";
$resultset = mysqli_query($conn, $sqli);
    while( $rows = mysqli_fetch_assoc($resultset) ) {
        $logID = $rows["login_id"];
    }
$sql1="INSERT INTO petdetails(`pet_name`,`doctor`) VALUES ('$pet','$vet')";
$sql2 = "INSERT INTO ownerpet(`login_id`) VALUES ('$logID')";

if(($conn->query($sql1)===TRUE)&&($conn->query($sql2)===TRUE)){
    echo '<script>alert("Success")</script>';
    header("Location:../admin.php");
    
}
else{
    echo "Error". $sql1. "".$sql2. "<br>". $conn->error;
    //header("Location:../account.php?error=$em");
}

?>