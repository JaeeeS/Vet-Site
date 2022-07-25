<?php
include "database/db.php";
session_start();

if((isset($_SESSION["user-id"])) && ($_SESSION["user-id"] !== null)){
    header("Location: profile.php");
    exit();
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
<div class="header" style="background: white;">
    <div class="navbar">
        <div class= "logo">
            <a  style="color:#207567;font-weight: bold" href="index.html">VetCare</a>
        </div>
        <nav>
            <ul class="aMI" id="MenuItems">
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
<div class="account">
<!---account-->
    
    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col2">
                    <img src="images/st.png">
                </div>
                <div class="col2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="login()">Login</span>
                            <span onclick="register()">Sign-up</span>
                            <hr id="Indicator">
                        </div>
                        <form method="post" action="database/login.php" id="LoginForm">                      <?php if (isset($_SESSION['error'])) {?>
                            <small><?php echo $_SESSION['error'];?></small><?php }?>
                            <input type="text" name="username-login" placeholder="Username">
                            <input type="password" name="password-login" placeholder="Password">
                            <button type="submit" class="btn">Login</button>
                        </form>
                        
                        <form method="post" action="database/sign-up.php" id="RegForm">
                            <?php if (isset($_SESSION['name_error'])) {?>
                            <small><?php echo $_SESSION['name_error'];?></small>
                            <?php } else if(isset($_SESSION['email_error'])){?><small><?php echo $_SESSION['email_error'];?></small><?php }?>
                            <input type="text" name="username" placeholder="Username">
                            <input type="email" name="email" placeholder="Email">
                            <input type="password" name="password" placeholder="Password">
                            <button type="submit" class="btn">Register</button>
                        </form>
                    </div>
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