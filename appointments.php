<?php 
session_start();
include "database/db.php";
if (!isset($_SESSION['user-id']))
	{
        echo "<script> alert('Log in to access this section')</script>";
		header('location:accessdenied.html');
	}
$i = $_SESSION["user-id"];
?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset ="UTF-8">
    <meta name="viewport" content="width-device width, initial scale=1.0">
    <title>VetCare | Veterinary Clinic</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,700;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
</head>
<body>
<div class="header" >
    <div class="navbar">
        <div class= "logo">
            <a  style="font-weight: bold" href="index.html">VetCare</a>
        </div>
        <nav>
            <ul  id="MenuItems">
                <li><a href="index.html">Home</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="about-us.html">For New Clients</a></li>
                <li><a href="appoint.php">Appointment</a></li>
                <li><a href="account.php">Account</a></li>
            </ul>
            <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
        </nav>
    </div>
</div>
<div class="appointment-list">
<!---account-->
    <div class="appointment-list-page">
        <div class="container">
            <a href="appoint.php"><button class="btn">Set Appointment</button></a>
            <h1>Appointment Requests</h1>
            <div class="tab">
              <button class="tablinks" onclick="openCity(event, 'Processing')">Processing</button>
              <button class="tablinks" onclick="openCity(event, 'Approved')">Approved</button>
              <button class="tablinks" onclick="openCity(event, 'Cancelled')">Cancelled</button>
            </div>
            <div id="Processing" class="tabcontent">
            <div class="row">
                <?php
                $pend = "Processing";
                $sql ="SELECT * FROM `appointment` WHERE login_id = '{$i}' AND status = 'Processing'";
                $resultset = mysqli_query($conn, $sql);
                while( $rows = mysqli_fetch_assoc($resultset) ) {  ?>
                <div class="col2">
                    <div class="bo">
                        <h3><?php echo $rows["pet_name"];?></h3>
                        <hr>
                        <table>
                            <tr>
                                <td>Date:</td>
                                <td><p><?php echo $rows["date"];?></p></td>
                            </tr>
                            <tr>
                                <td>Time:</td>
                                <td><p><?php echo $rows["time"];?></p></td>
                            </tr>
                            <tr>
                                <td>Reason:</td>
                                <td><p><?php echo $rows["reason"];?></p></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <?php }?>
            </div>
            </div>
            <div id="Approved" class="tabcontent  s">
            <div class="row">
                <?php
                $app = "Approved";
                $sql ="SELECT * FROM `appointment` WHERE login_id = '{$i}' AND status = 'Approved'";
                $resultset = mysqli_query($conn, $sql);
                while( $rows = mysqli_fetch_assoc($resultset) ) {  ?>
                <div class="col2">
                    <div class="bo">
                        <h3><?php echo $rows["pet_name"];?></h3>
                        <hr>
                        <table>
                            <tr>
                                <td>Date:</td>
                                <td><p><?php echo $rows["date"];?></p></td>
                            </tr>
                            <tr>
                                <td>Time:</td>
                                <td><p><?php echo $rows["time"];?></p></td>
                            </tr>
                            <tr>
                                <td>Reason:</td>
                                <td><p><?php echo $rows["reason"];?></p></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <?php }?>
            </div>
            </div>
            <div id="Cancelled" class="tabcontent">
            <div class="row">
                <?php
                $can = "Cancelled";
                $sql ="SELECT * FROM `appointment` WHERE login_id = '{$i}' AND status = 'Cancelled'";
                $resultset = mysqli_query($conn, $sql);
                while( $rows = mysqli_fetch_assoc($resultset) ) {  ?>
                <div class="col2">
                    <div class="bo">
                        <h3><?php echo $rows["pet_name"];?></h3><?php $apt = $rows["apt_id"]; ?>
                        <hr>
                        <table>
                            <tr>
                                <td>Date:</td>
                                <td><p><?php echo $rows["date"];?></p></td>
                            </tr>
                            <tr>
                                <td>Time:</td>
                                <td><p><?php echo $rows["time"];?></p></td>
                            </tr>
                            <tr>
                                <td>Reason:</td>
                                <td><p><?php echo $rows["reason"];?></p></td>
                            </tr>
                        </table>
                        <p><strong>Reason for cancellation: </strong><br><?php
                        $result = mysqli_query($conn, "SELECT * FROM `cancelled` WHERE apt_id ='{$apt}'");
                            while( $row = mysqli_fetch_assoc($result) ) {
                        echo $row['reason'];}    
                        ?></p>
                    </div>
                </div>
                <?php }?>
            </div>
            </div>
        </div>
    </div>
</div>   
<!---footer--->
    <div class="footer">
    Copyright 2022-VetCare
    </div>

<!----toogle---->
    <script>
        var MenuItems= document.getElementById("MenuItems");
        
        MenuItems.style.maxHeight = "0px";
        
        function menutoggle(){
            if(MenuItems.style.maxHeight == "0px")
                {
                    MenuItems.style.maxHeight = "200px"
                }
            else{
        MenuItems.style.maxHeight = "0px";
            }
            
        }
    </script>
<!--toggle form--->
<script>
    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }
</script>

</body>
</html>