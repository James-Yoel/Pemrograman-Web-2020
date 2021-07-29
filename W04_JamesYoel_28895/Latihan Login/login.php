<?php
include 'config.php';

$username = $_POST['username'];
//$password = md5($_POST['password']);
$password = $_POST['password'];

// $login = mysql_query("SELECT * FROM user WHERE username='$username' AND password='$password'");
$login = $db->query("SELECT * FROM user WHERE username='$username' AND password='$password'");
// $cek = mysql_num_rows($login);
$cek = $login->num_rows;

if($cek>0){
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location: admin/index.php");
}
else{
    header("location:index.php");
}

?>