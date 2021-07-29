<?php
    include_once("../include/config.php");
    $id = $_GET['id'];

    $result = $db->query("DELETE FROM student WHERE id=$id");
    header("Location: ../view/main.php");
?>