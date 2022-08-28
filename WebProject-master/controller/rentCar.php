<?php
    $db = mysqli_connect("localhost","root","","car_rent");
    $carID = mysqli_real_escape_string($db,$_GET['carID']);
    $userID = mysqli_real_escape_string($db,$_GET['userID']);
    $takeTime = mysqli_real_escape_string($db,$_GET['takeTime']);
    $dropTime = mysqli_real_escape_string($db,$_GET['dropTime']);
    $city = mysqli_real_escape_string($db,$_GET['city']);
    $money = mysqli_real_escape_string($db,$_GET['money']);
    $query ="INSERT INTO rentedcars (carID,userID,takeTime,dropTime,cityID,money,isCancelled) VALUES ($carID,$userID,'$takeTime','$dropTime','$city',$money,0)";
    $result = mysqli_query($db,$query);
    header("Location: http://localhost/WebProject/index.php");
?>