<!DOCTYPE html>
<html>
    <head>
        <title>Student Data</title>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <!-- <link rel = 'stylesheet' href="assets/bootstrap-3.3.7/dist/css/boostrap.min.css"> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div class='container'>
            <nav class='navbar navbar-default' role='navigation'>
                <div class='container-fluid'>
                    <div class='navbar-header'>
                        <a class='navbar-brand' href='#'>[IF635] Web Programming</a>
                    </div>
                    <ul class='nav navbar-nav navbar-right'>
                        <li><a href='../index.php'>Students</a></li>
                    </ul>
                </div>
            </nav>
            <h1 class='text-center'>Update Student</h1>
            <?php
                if(!isset($_POST['Student_Id'])){
                    header('Location: index.php');
                }
                $sid = mysqli_real_escape_string($conn, strip_tags($_POST['Student_Id']));
                $query = 'SELECT * FROM siswa WHERE Student_Id="'.$sid.'";';
                $result = $conn->query($query);
                if(!$result){
                    header('Location: index.php');
                }
                $row = $result->fetch_assoc();
            ?>
            <form method='post' action='index.php'>
                <div class='form-group row'>
                    <label class='col-sm-3' for='sid'>Student ID: </label>
                    <div class='col-sm-6'>
                        <input class='form-control' type='hidden' name='sid' value='<?php echo $row['Student_Id']; ?>'>
                    </div>
                    <div class='col-sm-6'>
                        <input class='form-control' type='text' name='sidmask' value='<?php echo $row['Student_Id']; ?>' disabled>
                    </div>
                </div>
                <div class='form-group row'>
                    <label class='col-sm-3' for='sname'>Student Name: </label>
                    <div class='col-sm-6'>
                        <input class='form-control' type='text' name='sname' value='<?php echo $row['Student_Name']; ?>'>
                    </div>
                </div>
                <div class='form-group row'>
                    <label class='col-sm-3' for='snim'>Student NIM: </label>
                    <div class='col-sm-6'>
                        <input class='form-control' type='text' name='snim' value='<?php echo $row['Student_Nim']; ?>'>
                    </div>
                </div>
                <div class='form-group row'>
                    <label class='col-sm-3' for='sangkatan'>Student Angkatan: </label>
                    <div class='col-sm-6'>
                        <input class='form-control' type='text' name='sangkatan' value='<?php echo $row['Student_Angkatan']; ?>'>
                    </div>
                </div>
                <div class='form-group row'>
                    <label class='col-sm-3' for='sjurusan'>Student Jurusan: </label>
                    <div class='col-sm-6'>
                        <input class='form-control' type='text' name='sjurusan' value='<?php echo $row['Student_Jurusan']; ?>'>
                    </div>
                </div>
                <input type='hidden' name='do' value='update_student.php'>
                <button type='submit' name='submit' class='btn btn-primary'>Edit Student</button>
                <button type='submit' name='loc' value='student_data.php' class='btn btn-default'>Cancel</button>
            </form>
        </div>
        <!-- <script src="assets/jquery-3.2.1.min.js"></script> -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!-- <script src="assets/bootstrap-3.3.7/dist/js/bootstrap.min.jsa"></script> -->
    </body>
</html>