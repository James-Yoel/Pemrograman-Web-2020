<?php
include 'student_model.php';

// $action = $_GET['action'];
// $id = $_GET['id'];

// if(strcmp($action, "show")==0 && strcmp($id, "dummy")==0){
    $obj = new Student();
    $obj->setID("08110110000");
    $obj->setName("Dummy Student");
    include 'student_view_show.php';
// }
// else echo "NO ACTION !";
?>