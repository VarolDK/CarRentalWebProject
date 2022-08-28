<?php
    session_start();
    $db = mysqli_connect("localhost","root","","car_rent");
    $query = "SELECT id from user WHERE password='".$_POST['oldpsw']."' AND id=".$_SESSION['user'];
    $result = mysqli_query($db,$query);
    if(mysqli_num_rows($result) == 1){
        $password = mysqli_real_escape_string($db,$_POST['newpsw']);
        $query = "UPDATE user SET password = '$password' WHERE id=".$_SESSION['user'];
        $result = mysqli_query($db,$query);
        header("Location: http://localhost/WebProject/profile.php?message=successPW");
    }else{
        header("Location: http://localhost/WebProject/profile.php?message=failPW");
    }
?>