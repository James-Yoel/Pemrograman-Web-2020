<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
</head>
<body>
    <header>
		<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class= "navbar-header" >
                    <a class="navbar-brand" href="#"> [IF635] Web Programming  </a>
                </div>
                <div>
                    <ul class="nav navbar-nav navbar-right">
                        <li class= "active" ><a href="../view/admin.php">Student</a></li>
                    </ul>
                </div>
            </div>
        </nav>
	</header>

    <?php
        include_once("../include/config.php");
        $id = $_GET['id'];
        $result = $db->query("SELECT * FROM student WHERE id=$id");

        while($data = mysqli_fetch_array($result)){
            $studentId = $data['studentId'];
            $firstName = $data['namaDepan'];
            $lastName = $data['namaBelakang'];
            $desc = $data['deskripsi'];
        }
    ?>

    <div class="container">
    <form action="edit.php" method="post" name="formEdit" style="width: 400px;">
        <div class="form-group">
            <label for="studentId"><b>Student ID</b></label>
            <input type="number" class="form-control" id="studentId" value="<?php echo "$studentId";?>" name="studentId">
        </div>
        <div class="form-group">
            <label for="firstName"><b>First Name</b></label>
            <input type="text" class="form-control" id="firstName"  value="<?php echo "$firstName";?>" name="firstName">
        </div>
        <div class="form-group">
            <label for="lastName"><b>Last Name</b></label>
            <input type="text" class="form-control" id="lastName"  value="<?php echo "$lastName";?>" name="lastName">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" rows="5" name="description"><?php echo "$desc";?></textarea>
        </div>
        <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
        <button type="submit" class="btn btn-primary" value="Add" name="update">Update</button>
        <button type="submit" class="btn" onclick="return redirect()">Cancel</button>
    </form>
    </div>

    <?php
        if(isset($_POST['update'])){
            $id = $_POST['id'];
            $studentId = $_POST['studentId'];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $desc = $_POST['description'];
            //var_dump($id); var_dump($studentId); var_dump($firstName); var_dump($lastName);

            $result = $db->query("UPDATE student SET studentId='$studentId', namaDepan='$firstName', namaBelakang='$lastName', deskripsi='$desc' WHERE id='$id'");
            header("Location: ../view/admin.php");
        }
    ?>

    <script>
        function redirect() {
            window.location.replace("../view/admin.php");
            return false;
        }
    </script>

</body>
</html>