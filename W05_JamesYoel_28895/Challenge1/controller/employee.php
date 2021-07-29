<?php
    include_once('../include/db_connection.php');
    include_once('../model/employee.php');
    $db = new Database();
    $db = $db->databaseConnect();
    $query = "SELECT * FROM employees";
    $result = $db->query($query);
    foreach($result as $row){
        $employee = new Employee($row[2], $row[1], $row[3], $row[13], $row[5], $row[7], $row[8], $row[12]);
        // echo $row[2];
        // echo " ";
        // echo $row[1];
        // echo " ";
        // echo $row[3];
        // echo " ";
        // echo $row[13];
        // echo " ";
        // echo $row[5];
        // echo " ";
        // echo $row[7];
        // echo " ";
        // echo $row[8];
        // echo " ";
        // echo $row[12];
        // echo "<br/>";
    }
    include_once('../view/employee.php');
?>