<?php
include "database/db.php";
session_start();
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
<div class="admin">
<!---account-->
    <a class="log" href="database/logout.php"><img src="images/logout.png"></a>
    <div class="admin-page">
        <div class="container">
            <div class="con">
            <div class="tab">
              <button class="tablinks" onclick="openCity(event, 'Details')">Add Pet</button>
              <button class="tablinks" onclick="openCity(event, 'Vaccine')">Vaccination</button>
              <button class="tablinks" onclick="openCity(event, 'Medication')">Medication</button>
                <button class="tablinks" onclick="openCity(event, 'Pending')">Pending Vaccine</button>
            </div>

            <div id="Details" class="tabcontent">
              <h3>Add New Pet</h3>
              <form method="post" action="database/details.php" id="LoginForm">
                  <label for="owner">Owner's User Name:</label>
                  <input list="owner" name="owner" required>
                        <datalist id="owner">
                            <?php
                            $sql ="SELECT * FROM `login` WHERE role = 'client'";
                            $resultset = mysqli_query($conn, $sql);
                            while( $rows = mysqli_fetch_assoc($resultset) ) {  ?>
                            <option value="<?php echo $rows["username"];?> "></option><?php }?>
                        </datalist>
                  <label for="pet">Furbaby's Name:</label>
                  <input type="text" name="pet" required>
                  <label for="vet">Main Veterinarian:</label>
                  <input type="text" name="vet"required>
                    <button type="submit" class="btn">Enter</button>
              </form>
            </div>

            <div id="Vaccine" class="tabcontent  s">
              <h3>Vaccination</h3>
              <form method="post" action="database/vax.php" id="LoginForm">  
                  <label for="pet">Furbaby's Name:</label>
                  <input list="pet" name="pet"required >
                        <datalist id="pet">
                            <?php
                            $sql ="SELECT * FROM `petdetails`";
                            $resultset = mysqli_query($conn, $sql);
                            while( $rows = mysqli_fetch_assoc($resultset) ) {  ?>
                            <option value="<?php echo $rows["pet_name"];?> "></option><?php }?>
                        </datalist>
                  <label for="vaccine">Vaccine Name:</label>
                  <input type="text" name="vaccine"required>
                  <label for="date">Date:</label>
                  <input type="date" name="date" required>
                  <button type="submit" class="btn">Enter</button>
              </form>
            </div>

            <div id="Medication" class="tabcontent">
              <h3>Medication</h3>
              <form method="post" action="database/med.php" id="LoginForm">  
                  <label for="pet">Furbaby's Name:</label>
                  <input list="pet" name="pet" required>
                        <datalist id="pet">
                            <?php
                            $sql ="SELECT * FROM `petdetails`";
                            $resultset = mysqli_query($conn, $sql);
                            while( $rows = mysqli_fetch_assoc($resultset) ) {  ?>
                            <option value="<?php echo $rows["pet_name"];?> "></option><?php }?>
                        </datalist>
                  <label for="medicine">Medicine:</label>
                  <input type="text" name="medicine"required >
                  <label for="date">Date:</label>
                  <input type="date" name="date"required>
                    <button type="submit" class="btn">Enter</button>
              </form>
            </div>
            <div id="Pending" class="tabcontent">
              <h3>Pending Vaccine</h3>
              <form method="post" action="database/pend.php" id="LoginForm">  
                  <label for="pet">Furbaby's Name:</label>
                  <input list="pet" name="pet" required>
                        <datalist id="pet">
                            <?php
                            $sql ="SELECT * FROM `petdetails`";
                            $resultset = mysqli_query($conn, $sql);
                            while( $rows = mysqli_fetch_assoc($resultset) ) {  ?>
                            <option value="<?php echo $rows["pet_name"];?> "></option><?php }?>
                        </datalist>
                  <label for="vaccine">Vaccine Name:</label>
                  <input type="text" name="vaccine"required>
                  <label for="date">Date:</label>
                  <input type="date" name="date"required>
                    <button type="submit" class="btn">Enter</button>
              </form>
            </div>
            </div>
        </div>
    </div>
</div>   
<!---footer--->
    <div class="footer">
    Copyright 2022-VetCare
    </div>

<script src="script.js"></script>
  
</body>
</html>