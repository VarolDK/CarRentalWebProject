<?php
    session_start();
    $db = mysqli_connect("localhost","root","","car_rent");
    $mail = mysqli_real_escape_string($db,$_POST['email1']);
    $query = "UPDATE user SET email = '$mail' WHERE id=".$_SESSION['user'];
    $result = mysqli_query($db,$query);
    header("Location: http://localhost/WebProject/profile.php?message=successMAIL");
?>