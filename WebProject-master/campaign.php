<?php
  session_start();
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
          <h1> Company Outline </h1>
          <p class="campaign">&nbsp&nbsp&nbsp We are  Rent-A-Car. Founded in 2021,  Rent-A-Car is Turkey's most distinguished rental car company.
We provide customers with approximately 120 locations and 2,000 vehicles throughout Turkey.
As we are not affiliated with any specific automaker, we are able to provide a variety of vehicle makes and models for customers to rent.
Rather than let vehicles age, we also replace our most popular passenger vehicles every few years.
Replacing used vehicles eliminates uncomfortable wear and tear, and reduces the risk of breakdown and other inconveniences to our customers.
The most trusted name in vehicle rentals. </p>
          <h1>Action Guidlines </h1>
          <p class="campaign">We will be united to do followings: <br>
1. Try to offer safe, trusted, clean and comfortable vehicle as well as upmost satisfactory and best services to our clients to obtain best confident to us from them.<br>
2. Challenge always to introduce innovative and unique services to offer convenient and economical vehicle usage services.<br>
3. Commit to respect humanistic and help each other, and make employee friendly workplace where everyone finds worth for working and rearises growth by oneself.</p>
          <h1>Improving Quality in Three Major Areas</h1>
          <p class="campaign">&nbsp&nbsp&nbspIn order to provide customers with safety and peace of mind,  Rent-A-Car strives to improve quality in three major areas.
Vehicle Quality Customer Service Quality Rental Location Quality
More than just rental cars, we provide customers with a variety of services for satisfaction and peace of mind.
Whenever and wherever we operate, appreciation for our customers always comes first. We not only strive to promote vehicle rentals, but also to create added value.
We engage in a variety of other initiatives as well. As a company dealing in automobiles, the environment always remains a crucial concern. We were one of the first rental services to establish a hybrid rental class and provide eco-friendly driving.
However, we will not rest on these laurels. Our sincere wish, moving forward, is to continue to serve the community, as a company that is friendly to both people and the environment.
 Rent-A-Car relies on the support of its customers. We look forward to your business.  </p>


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
 