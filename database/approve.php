<?php 
session_start();
include "db.php";

$id = $_POST['id'];


if (isset($_POST['approve']))   {
    $sql="UPDATE `appointment` SET `status` = 'Approved' WHERE `appointment`.`apt_id` = '{$id}'";

    if($conn->query($sql)===TRUE){
        echo '<script>alert("Appointment Request Sent")</script>';
        header("Location:../adminAppoint.php");
    }
    else{
        echo "Error". $sql. "<br>". $conn->error;
        //header("Location:../account.php?error=$em");
    }
}
elseif(isset($_POST['cancel'])){
    $reas = $_POST['reject'];
    $sql1="UPDATE `appointment` SET `status` = 'Cancelled' WHERE `appointment`.`apt_id` = '{$id}'";
    $sql2="INSERT INTO cancelled(`apt_id`,`reason`) VALUES ('$id','$reas')";

    if(($conn->query($sql1)===TRUE)&&($conn->query($sql2)===TRUE)){
        echo '<script>alert("Appointment Request Sent")</script>';
        header("Location:../adminAppoint.php");
    }
    else{
        echo "Error". $sql. "<br>". $conn->error;
        //header("Location:../account.php?error=$em");
    }
}
$conn->close();
?>