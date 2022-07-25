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
    <center>
<div class="disclaimer">This website is for presentation purposes only and is based on Southvalley Veterinarian Clinic <a href = "https://www.facebook.com/southvalleyvc">https://www.facebook.com/southvalleyvc</a></div>   </center> 
</head>
<body>
<div class="header">
    <div class="navbar">
        <div class= "logo">
            <a  style="font-weight: bold" href="index.html">VetCare</a>
        </div>
        <nav>
            <ul id="MenuItems">
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
<div class="appointment set">
<!---contact-us-->
    <div class="appointment-page">
        <div class="container">
            <div class="box">
                <p class="view">
                    <a href="appoint.php"><button class="btn">Set Appointment</button></a>
                </p>
                
                <h1 style="text-align:center">Appointments</h1>
                <div class="apt">
                    <table>
                        <tr>
                            <th>Pet Name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Reason</th>
                            <th>Status</th>
                        </tr>
                         <?php $sta = "Completed";
                            $sql = "SELECT * FROM `appointment` WHERE login_id = '{$i}'";
                            $resultset = mysqli_query($conn, $sql);
                            while( $rows = mysqli_fetch_assoc($resultset) ) { 
                        ?>
                        <tr>
                            <td><?php echo $rows["pet_name"];?></td>
                            <td><?php echo $rows["date"];?></td>
                            <td><?php echo $rows["time"];?></td>
                            <td><?php echo $rows["reason"];?></td>
                            <td><?php echo $rows["status"];?></td>
                        </tr><?php } ?>
                    </table>
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
  
</body>
</html>