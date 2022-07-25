<?php 
session_start();
include "db.php";
$i = $_SESSION["user-id"];
$date = $_POST['date'];
$time = $_POST['time'];
$petname = $_POST['petname'];
$reason = $_POST['reason'];
$stat = "Processing";


$sql="INSERT INTO appointment(`login_id`,`date`, `time`,`pet_name`,`reason`,`status`) VALUES ('$i','$date','$time','$petname', '$reason','$stat')";



if($conn->query($sql)===TRUE){
    echo '<script>alert("Appointment Request Sent")</script>';
    header("Location:../appointments.php");
    
}
else{
    echo "Error". $sql. "<br>". $conn->error;
    //header("Location:../account.php?error=$em");
}



$conn->close();
?>