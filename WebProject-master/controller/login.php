<?php
        $db = mysqli_connect("localhost","root","","car_rent");
        $mail = $_POST['email'];
        $pass = $_POST['psw'];
        $query = "SELECT id,F_name,L_name,isAdmin FROM user WHERE email='$mail' AND password = '$pass'";
        $result = mysqli_query($db,$query);
        if(mysqli_num_rows($result) == 1){
            session_start();
            $row = mysqli_fetch_array($result);
            $_SESSION['user'] = $row['id'];
            $_SESSION['name'] = ($row['F_name']." ".$row['L_name']);
            if($row['isAdmin'] == 1){
                header("Location: http://localhost/WebProject/admin.php");
                exit();
            }else{
                header("Location: http://localhost/WebProject/index.php");
                exit();
      
            }
        }else{
            header("Location: http://localhost/WebProject/index.php?message=login");

        }
?>