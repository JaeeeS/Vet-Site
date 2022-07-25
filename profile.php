<?php
session_start();
include "database/db.php";
if((isset($_SESSION["role"])) &&($_SESSION["role"] == 'admin')){
    header("Location: admin.php");
    exit();
}
if (!isset($_SESSION['user-id'])){
    echo "<script> alert('Log in to access this section')</script>";
		header('location:accessdenied.html');
}
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
<div class="profile">
<!---account-->   
    <a class="log" href="database/logout.php"><img src="images/logout.png"></a>
    <div class="profile-page">
        
        <div class="container">
              <?php
            $i = $_SESSION["user-id"];
            $array1 = array();$pet=0;
            $sql = "SELECT * FROM `ownerpet` WHERE login_id = '{$i}'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  $array1 = array_merge($array1, array_map('trim', explode(",", $row['pet_id'])));
                  $pet++;
              }

            } else {?>
                        <div class="box no">
                            <h2><?php echo "Profile not yet set";?></h2>
                            <hr>
                            <p>Please visit the clinic to make your furbaby profile updated!</p>
                        </div>
            <?php
            }
                    $lim = 0;
                    while($lim<$pet){?>
                    <div class="box">
                    <div class="con">
                        <?php
                        $sql ="SELECT * FROM `petdetails` WHERE pet_id = '{$array1[$lim]}'";
                        $resultset = mysqli_query($conn, $sql);
                        while( $rows = mysqli_fetch_assoc($resultset) ) { 
                        ?>
                    <h1 style="text-align:center"><?php echo $rows["pet_name"];?></h1>
                    <hr>
                    <p class="black"><strong> Main Veterenarian : </strong> <?php echo  $rows["doctor"];}?></p>
                <div class="vax">
                    <h2>Vaccination</h2>
                    <table>
                        <tr>
                            <th>Vaccine</th>
                            <th>Date</th>
                        </tr>
                    <?php
                        $sql = "SELECT * FROM `vaccination` WHERE pet_id = '{$array1[$lim]}'";
                        $resultset = mysqli_query($conn, $sql);
                        while( $rows = mysqli_fetch_assoc($resultset) ) { 
                        ?>
                        <tr>
                            <td><?php echo $rows["vaccine_name"];?></td>
                            <td><?php echo $rows["date"];}
                            ?></td>
                        </tr>
                    </table>
                </div>
                <div class="med">
                    <h2>Medications</h2>
                    <table>
                        <tr>
                            <th>Medicine</th>
                            <th>Date</th>
                        </tr>
                    <?php
                        $sql = "SELECT * FROM `medication` WHERE pet_id = '{$array1[$lim]}'";
                        $resultset = mysqli_query($conn, $sql);
                        while( $rows = mysqli_fetch_assoc($resultset) ) { 
                        ?>
                        <tr>
                            <td><?php echo $rows["medicine"];?></td>
                            <td><?php echo $rows["date"];}
                            ?></td>
                        </tr>
                    </table>                
                </div>
                <div class="pend">
                    <h2>Next Vaccine</h2>
                    <table>
                        <tr>
                            <th>Vaccine</th>
                            <th>Date</th>
                        </tr>
                    <?php
                        $sql = "SELECT * FROM `pendingvaccine` WHERE pet_id = '{$array1[$lim]}'";
                        $resultset = mysqli_query($conn, $sql);
                        while( $rows = mysqli_fetch_assoc($resultset) ) { 
                        ?>
                        <tr>
                            <td><?php echo $rows["vaccine"];?></td>
                            <td><?php echo $rows["date"];}
                            ?></td>
                        </tr>
                    </table>                
                </div>
                </div>
            </div><?php $lim++;}?> 
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
    
    <!--toggle form--->
    var LoginForm = document.getElementById("LoginForm");
        var RegForm = document.getElementById("RegForm");
        var Indicator = document.getElementById("Indicator");
    
            function register(){
                RegForm.style.transform = "translateX(0px)";
                LoginForm.style.transform = "translateX(0px)";
                Indicator.style.transform = "translateX(100px)";
            }
            
            function login(){
                RegForm.style.transform = "translateX(300px)";
                LoginForm.style.transform = "translateX(300px)";
                Indicator.style.transform = "translateX(0px)";
            }
        
    </script> 
</body>
</html>