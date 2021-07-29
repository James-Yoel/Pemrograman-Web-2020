<?php
    session_start();
    include_once("../include/config.php");
    if(isset($_POST['email'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        // $salt = 'nais';
        $salt = substr($email, 0, 2);
        // echo $salt;
        $passSalt = $password.$salt;
        // echo $passSalt;
        $hashPass = md5($passSalt);
        // echo $hashPass;
        // echo $email;
        $login = $db->query("SELECT * FROM user WHERE email='$email' AND password='$hashPass'");
        if($login->num_rows > 0){
            $row = $login->fetch_assoc();
            $_SESSION['user'] = $email;
            header('location: ../view/admin.php');
        }
        else {
            header('location: ../view/mainError.php');
        }
        exit();
    }
    
?>

