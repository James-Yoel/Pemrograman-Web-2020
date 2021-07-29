<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
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
                        <li class= "active" ><a href="main.php">Student</a></li>
                    </ul>
                </div>
            </div>
        </nav>
	</header>
    <div class="container">
    <form action="add.php" method="post" name="formAdd" style="width: 400px;">
        <div class="form-group">
            <label for="studentId"><b>Student ID</b></label>
            <input type="number" class="form-control" id="studentId" placeholder="Student Id" name="studentId">
        </div>
        <div class="form-group">
            <label for="firstName"><b>First Name</b></label>
            <input type="text" class="form-control" id="firstName" placeholder="First Name" name="firstName">
        </div>
        <div class="form-group">
            <label for="lastName"><b>Last Name</b></label>
            <input type="text" class="form-control" id="lastName" placeholder="Last Name" name="lastName">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" rows="5" placeholder="Description" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" value="Add" name="Submit">Submit</button>
        <button type="submit" class="btn" onclick="return redirect()">Cancel</button>
    </form>
    </div>

    <?php
        if(isset($_POST['Submit'])){
            $studentId = $_POST['studentId'];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $desc = $_POST['description'];

            include_once("config.php");
            $result = $db->query("INSERT INTO student(studentId, namaDepan, namaBelakang, deskripsi) VALUES('$studentId', '$firstName', '$lastName', '$desc')");
            header("Location: main.php");
        }
    ?>

    <script>
        function redirect() {
            window.location.replace("main.php");
            return false;
        }
    </script>
</body>
</html>
