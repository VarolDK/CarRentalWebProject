<?php
$db = mysqli_connect("localhost","root","","car_rent");
//--------------------UPLOAD IMAGE-----------------------
    $target_dir = "../images/"; // folder path
    $query = "SELECT MAX(id) as id from cars";
    $result = mysqli_query($db,$query);
    $row = mysqli_fetch_array($result);
    $target_file = $target_dir ."arac".($row['id']+1).".png";
    move_uploaded_file($_FILES["imageFile"]["tmp_name"], $target_file);
//--------------------Database -----------------------
  
    $carBrand = mysqli_real_escape_string($db,$_POST['carBrand']);
    $carName = mysqli_real_escape_string($db,$_POST['carName']);
    $carPrice = mysqli_real_escape_string($db,$_POST['carPrice']);
    $deposit = mysqli_real_escape_string($db,$_POST['deposit']);
    $gear = mysqli_real_escape_string($db,$_POST['gear']);
    $fuel = mysqli_real_escape_string($db,$_POST['fuel']);
    $imageFile = mysqli_real_escape_string($db,"arac".($row['id']+1).".png");
    $cityID = mysqli_real_escape_string($db,$_POST['city']);
    $query ="INSERT INTO cars (carBrand,carName,carPrice,deposit,gear,fuel,photoPath,cityID) VALUES ('$carBrand','$carName',$carPrice,$deposit,'$gear','$fuel','$imageFile','$cityID')";
    $result = mysqli_query($db,$query);
    header("Location: http://localhost/WebProject/index.php");
    exit();
?>