<?php
    $db = mysqli_connect("localhost","root","","car_rent");
    $ID = mysqli_real_escape_string($db,$_GET['ID']);
    $query ="UPDATE rentedcars set isCancelled=1 WHERE id=".$ID;
    $result = mysqli_query($db,$query);
    header("Location: http://localhost/WebProject/rentedCars.php");
?>