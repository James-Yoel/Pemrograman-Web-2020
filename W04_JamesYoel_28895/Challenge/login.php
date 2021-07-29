<?php
    include_once("config.php");
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
    echo $login->num_rows;
?>

