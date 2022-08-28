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
      <section id="shout">
        <p id="rentedCarShout1">Take Time</p>
        <p id="rentedCarShout2">Drop time</p>
        <p id="rentedCarShout3">Money</p>
        <p id="rentedCarShout4">Deposit</p>
      </section>
          <?php
          include_once("controller/rentlist.php");
          getRentedCars();
          ?>
      <div id="overlay">
        <div id="overlayContainer">
            <div id="text"></div>
            
              <button class="yesButton" onclick="overlayYES()">Yes</button>
              <button class="noButton" onclick="overlayOFF()">No</button>
           
        </div>
      </div>

  </div>
</div>



<!-- Footer -->
<div class="wrapper row3">
  <footer id="footer" class="clear">
    <p class="fl_left">Rent a Car </p>
   
  </footer>
</div>
  <script src="scripts/scripts.js"></script>
</body>
</html>
 