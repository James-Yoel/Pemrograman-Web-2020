<?php
session_start();
session_destroy();
header("location: ../view/main.php");
?>