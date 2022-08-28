<?php
  session_start();
  if(!isset($_SESSION['user'])){
    header("Location: http://localhost/WebProject/index.php?message=login");
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<title>Rent A Car</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="styles/layout.css" type="text/css">
<link rel="stylesheet" href="styles/profile.css" type="text/css">
<script src="https://kit.fontawesome.com/f10e5983fc.js" crossorigin="anonymous"></script>

</head>
<body>
  <div class="form-popup" id="loginForm">
    <form action="controller/login.php" class="form-container" method="POST">
      <h1>Login</h1>
      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <button type="submit" class="btn">Login</button>
      <button type="button" class="btnReg" onclick="openRegForm()">Sign Up</button>
      <button type="button" class="btn cancel" onclick="closeForm('loginForm')">Close</button>
    </form>
  </div>

  <div class="form-popup" id="regForm">
    <form action="controller/register.php" class="form-container" method="POST">
      <h1>Register</h1>
      <label for="Fname"><b>First name</b></label>
      <input type="text" placeholder="Enter First Name" name="Fname" required>
      <label for="Lname"><b>Last Name</b></label>
      <input type="text" placeholder="Enter Second Name" name="Lname" required>
      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <button type="submit" class="btn">Submit</button>
      <button type="button" class="btn cancel" onclick="closeForm('regForm')">Close</button>
    </form>
  </div>

<div class="wrapper row1">
  <header id="header" class="clear">
    <div id="hgroup">
      <h1><a href="index.php">Rent A Car</a></h1>
      <h2>Affordable Rent A Car Website </h2>
    </div>
    <nav>
      <ul> 
        <li><a href="cars.php" >Cars</a></li>
        <li><a href="campaign.php">About Campaign</a></li>
        <?php
          if(isset($_SESSION['name'])){
            if($_SESSION['user']==6){
              echo "<li><a href='admin.php'>Add Car</a></li>
              <li><a href='controller/logout.php' >Logout</a></li>
              <li><a href='profile.php' > Welcome ".$_SESSION['name']."</a></li>";
            }else{
            echo "<li><a href='rentedCars.php' >Rented Cars</a></li>
                  <li><a href='controller/logout.php' >Logout</a></li>
                  <li><a href='profile.php' > Welcome ".$_SESSION['name']."</a></li>";
            }
          }else{
            echo "<li id = 'loginButton'><a href='#' onclick='openForm()'>Login</a></li>";
          }
        ?>
      </ul>
    </nav>
  </header>
</div>


<div class="wrapper row2">
  <div id="container" class="clear">
    <div class='iconContainer'>
      <i class="fas fa-user" id='userIcon'></i>
      <p class="iconInfo"><?php echo strtoupper($_SESSION['name']); ?></p>
      <p class="iconInfo"><?php
        include_once("controller/rentlist.php");
        getmail();
      ?></p>
    </div>
    <div class='formContainer'>
      <form action="controller/passwordChange.php" class="container" method="POST">
        <h1>Password Change</h1>
        <?php
          if(isset($_GET['message'])) {
            if($_GET['message'] == 'successPW'){
              echo "<label style='color: green; display:block'><b>Password succesfully changed</b></label>";
            }
            if($_GET['message'] == 'failPW'){
              echo "<label style='color: red; display:block'><b>Old password is not correct</b></label>";
            }
          }
        ?>
        <label for="oldpsw"><b>Old Password</b></label>
        <input type="password" placeholder="Enter old Password" name="oldpsw" id="oldpsw" required>
        <label id="pswMatch" style="color: red; display:none"><b>Password not match</b></label>
        <label for="psw"><b>New Password</b></label>
        <input type="password" placeholder="Enter new Password" name="newpsw" id="newpsw"required>
        
        <label for="psw"><b>New Password confirm</b></label>
        <input type="password" placeholder="Enter new Password" name="newpsw2" id="newpsw2" required>
        
        <button type="submit" class="registerbtn" id="registerbtn" >Change Password</button>
      </form>
    </div>

    <div class='formContainer'>
      <form action="controller/mailChange.php" class="container" method="POST">
        <h1>Email Change</h1>
        <?php
          if(isset($_GET['message'])) {
            if($_GET['message'] == 'successMAIL'){
              echo "<label style='color: green; display:block'><b>Mail succesfully changed</b></label>";
            }
          }
        ?>
        <label id="emailMatch" style="color: red; display:none"><b>Email not match</b></label>
        <label for="email"><b>New mail</b></label>
        <input type="email" placeholder="Enter new mail" name="email1" id="email1" required>
        
        <label for="psw"><b>New mail confirm</b></label>
        <input type="email" placeholder="Enter new mail" name="email2" id="email2" required>

        <button type="submit" class="registerbtn" id="emailbtn">Change Password</button>
      </form>
    </div>
  </div>
</div>



<!-- Footer -->
<div class="wrapper row3">
  <footer id="footer" class="clear">
    <p class="fl_left">Rent a Car </p>
   
  </footer>
</div>
  <script src="scripts/profile.js"></script>
</body>
</html>
 