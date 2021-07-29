<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

    <style>
        .fa:hover {
            color: blue;
        }
    </style>
</head>
<body>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sign In</h4>
                 </div>
                <div class="modal-body">
                    <form action="../controller/login.php" method="post">
                        <div class="form-group">
                            <label>Email </label>
                            <input class="form-control" type="email" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label>Password </label>
                            <input  class="form-control" type="password" name="password" id="password">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" style="float: left;">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <header>
		<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class= "navbar-header" >
                    <a class="navbar-brand" href="main.php"> [IF635] Web Programming  </a>
                </div>
                <div>
                    <ul class="nav navbar-nav navbar-right">
                        <li class= "active" ><a href="#">Student</a></li>
                    </ul>
                </div>
            </div>
        </nav>
	</header>
    <div class="container">
    <a class="btn btn-primary" href="../controller/add.php" role="button" style="float: right;">+ Student</a>
    </div>
    <?php
    include_once("../include/config.php");
    $result = $db->query("SELECT * FROM student");
    ?>
    <div class="container" style="margin-top: 10px;">
	    <table class="table table-striped table-bordered" id="listStudent" style="width:100%">
		    <thead>
			    <tr>
				    <th>#</th>
				    <th>Student ID</th>
				    <th>First Name</th>
				    <th>Last Name</th>
                    <th>Action</th>
			    </tr>
		    </thead>
		    <tbody>
            <?php
                while($data = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>".$data['id']."</td>";
                    echo "<td>".$data['studentId']."</td>";
                    echo "<td>".$data['namaDepan']."</td>";
                    echo "<td>".$data['namaBelakang']."</td>";
                    echo "<td><a href=\"../controller/delete.php?id=$data[id]\"><i class=\"fa fa-times-circle\" style=\"color: black; \"></i></a><br><a href=\"../controller/edit.php?id=$data[id]\"><i class=\"fa fa-wrench\" style=\"color: black; \"></i></a></td>";
                    echo "</tr>";
                }
                mysqli_free_result($result);
		        mysqli_close($db);
            ?>
            </tbody>
            <tfoot>
			    <tr>
                    <th>#</th>
				    <th>Student ID</th>
				    <th>First Name</th>
				    <th>Last Name</th>
                    <th>Action</th>
			    </tr>
		    </tfoot>
        </table>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
			var table = $('#listStudent').DataTable();
            $('#myModal').modal({ 
                keyboard: false, 
                show: true, 
                backdrop: 'static' 
            });
        });
    </script>

</body>
</html>