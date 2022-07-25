<?php 
session_start();
include "database/db.php";
if((isset($_SESSION["role"])) &&($_SESSION["role"] == 'admin')){
    header("Location: adminAppoint.php");
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
<div class="appointment">
<!---appointment-us-->
    <div class="appointment-page">
        <div class="container">
            <div class="info">
                <p class="view">
                    <a href="appointments.php"><button class="btn">View Appointments</button></a>
                </p>
                
                <h1 style="text-align:center">Set an Appointment Request</h1>
                <div class="box">
                    <form method="post" action="database/add-appointment.php">
                        <label for="date">Date of Appointment:</label>
                        <input name="date" type = "date" required>
                        <label for="time">Time:</label>
                        <input name = "time" type="time" required><br>
                        <label for = "petname">Pet Name:</label>
                        <input list="petname" name="petname" required>
                        
                        <datalist id="petname">
                         <?php $i = $_SESSION["user-id"];
                        $array1 = array();$pet=0;
                        $sql = "SELECT * FROM `owner-pet` WHERE login_id = '{$i}'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                              $array1 = array_merge($array1, array_map('trim', explode(",", $row['pet_id'])));
                              $pet++;
                          }  
                        }  $lim = 0;
                        while($lim<$pet){
                            $sql ="SELECT * FROM `pet-details` WHERE pet_id = '{$array1[$lim]}'";
                            $resultset = mysqli_query($conn, $sql);
                            while( $rows = mysqli_fetch_assoc($resultset) ) {  ?>
                            <option value="<?php echo $rows["pet_name"];?> "></option><?php }$lim++;}?>
                        </datalist><br>
                        <label for="reason">Reason for Appointment:</label> <br>
                        <textarea name = "reason" required></textarea>
                        <input class="btn" type="submit">
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