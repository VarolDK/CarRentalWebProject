<?php
    $db = mysqli_connect("localhost","root","","car_rent");
    $query = "SELECT id from user WHERE email='".$_POST['email']."'";
    $result = mysqli_query($db,$query);
    if(mysqli_num_rows($result) == 0){
        $Fname = mysqli_real_escape_string($db,$_POST['Fname']);
        $Lname = mysqli_real_escape_string($db,$_POST['Lname']);
        $email = mysqli_real_escape_string($db,$_POST['email']);
        $password = mysqli_real_escape_string($db,$_POST['psw']);
        $query = "INSERT INTO user(F_name,L_name,email,password,isAdmin) VALUES ('$Fname','$Lname','$email','$password',false)";
        $result = mysqli_query($db,$query);
        header("Location: http://localhost/WebProject/index.php");
    }else{
        header("Location: http://localhost/WebProject/index.php?message=exist");
    }
?>