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
<div class="adminApp">
<!---account-->
    <div class="adminApp-page">
        <div class="container">
            <h1 style="text-align:center">Appointments</h1>
            <div class="tab">
              <button class="tablinks" onclick="openCity(event, 'Details')">Request</button>
              <button class="tablinks" onclick="openCity(event, 'Approved')">Approved</button>
              <button class="tablinks" onclick="openCity(event, 'Cancelled')">Cancelled</button>
            </div>
            <div id="Details" class="tabcontent s">
            <div class="row">
                <?php
                $pend = "Processing";
                $sql ="SELECT * FROM `appointment` WHERE status = '{$pend}'";
                $resultset = mysqli_query($conn, $sql);
                while( $rows = mysqli_fetch_assoc($resultset) ) {  ?>
                <div class="col5">
                    <div class="bo">
                        <form method="post" action="database/approve.php">
                        <h3>ID: <input name="id" value = "<?php echo $rows["apt_id"];?>" readonly></h3>
                        <hr>
                        <table>
                            <tr>
                                <td class="lab"><p>Pet Name:</p></td>
                                <td><input name="pet_name" value = "<?php echo $rows["pet_name"];?>" readonly></td>
                            </tr>
                            <tr>
                                <td class="lab">Date:</td>
                                <td><input name="date" value = "<?php echo $rows["date"];?>" readonly></td>
                            </tr>
                            <tr>
                                <td class="lab">Time:</td>
                                <td><input name="time" value = "<?php echo $rows["time"];?>" readonly></td>
                            </tr>
                            <tr>
                                <td class="lab">Reason:</td>
                                <td><textarea class="nodesign" name="reason"readonly><?php echo $rows["reason"];?></textarea></td>
                            </tr>
                        </table>
                            <label for="reject"><small>If cancelling the appointment request, please indicate the reason here:</small></label>
                            <textarea class="reject" name="reject"></textarea>
                            <input type="submit" class="btn" name="approve" value="Approve">
                            <input type="submit" class="btn" name="cancel" value="Cancel">
                        </form>
                    </div>
                </div>
                <?php }?>
            </div>
            </div>
            <div id="Approved" class="tabcontent">
            <div class="row">
                <?php
                $app = "Approved";
                $sql ="SELECT * FROM `appointment` WHERE status = '{$app}'";
                $resultset = mysqli_query($conn, $sql);
                while( $rows = mysqli_fetch_assoc($resultset) ) {  ?>
                <div class="col5">
                    <div class="bo">
                        <h3>ID: <input name="id" value = "<?php echo $rows["apt_id"];?>" readonly></h3>
                        <hr>
                        <table>
                            <tr>
                                <td class="lab"><p>Pet Name:</p></td>
                                <td><input name="pet_name" value = "<?php echo $rows["pet_name"];?>" readonly></td>
                            </tr>
                            <tr>
                                <td class="lab">Date:</td>
                                <td><input name="date" value = "<?php echo $rows["date"];?>" readonly></td>
                            </tr>
                            <tr>
                                <td class="lab">Time:</td>
                                <td><input name="time" value = "<?php echo $rows["time"];?>" readonly></td>
                            </tr>
                            <tr>
                                <td class="lab">Reason:</td>
                                <td><textarea class="nodesign" name="reason"readonly><?php echo $rows["reason"];?></textarea></td>
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
                $sql ="SELECT * FROM `appointment` WHERE status = '{$can}'";
                $resultset = mysqli_query($conn, $sql);
                while( $rows = mysqli_fetch_assoc($resultset) ) {  ?>
                <div class="col5">
                    <div class="bo">
                        <h3>ID: <input name="id" value = "<?php $apt = $rows["apt_id"]; echo $apt;?>" readonly></h3>
                        <hr>
                        <table>
                            <tr>
                                <td class="lab"><p>Pet Name:</p></td>
                                <td><input name="pet_name" value = "<?php echo $rows["pet_name"];?>" readonly></td>
                            </tr>
                            <tr>
                                <td class="lab">Date:</td>
                                <td><input name="date" value = "<?php echo $rows["date"];?>" readonly></td>
                            </tr>
                            <tr>
                                <td class="lab">Time:</td>
                                <td><input name="time" value = "<?php echo $rows["time"];?>" readonly></td>
                            </tr>
                            <tr>
                                <td class="lab">Reason:</td>
                                <td><textarea class="nodesign" name="reason"readonly><?php echo $rows["reason"];?></textarea></td>
                            </tr>
                        </table>
                        <p><strong>Reason for cancellation: </strong><?php
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