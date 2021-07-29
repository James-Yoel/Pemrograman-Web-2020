<?php
    include_once("config.php");
    $id = $_GET['id'];

    $result = $db->query("DELETE FROM student WHERE id=$id");
    header("Location:main.php");
?>