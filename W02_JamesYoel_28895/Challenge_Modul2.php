<!DOCTYPE html>
<html>
<head>
	<title>Challenge Modul 2</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
	<style>
	td.details-control {
		background: url('File Pendukung Modul 2/details_open.png') no-repeat center center;
		cursor: pointer;
	}
	tr.shown td.details-control {
		background: url('File Pendukung Modul 2/details_close.png') no-repeat center center;
	}
	</style>
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
                        <li class= "active" ><a href="#"> Employees </a></li>
                    </ul>
                </div>
            </div>
        </nav>
	</header>
	<div class="container" style="margin-top: 10px;">
	<table class="table table-striped table-bordered" id="listEmployee" style="width:100%">
		<thead>
			<tr>
				<th></th>
				<th>Last Name</th>
				<th>Title</th>
				<th>Extension</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$host = "localhost";
				$username = "root";
				$dbname = "northwind";
				$password = "";
				// $db = new mysqli($host, $username, $password, $dbname);
				// $query = "SELECT * FROM employees LIMIT 12";
				// $result = $db->query($query);
				// while ($row = $result->fetch_assoc()){
				// 	echo "<tr>";
				// 	echo "<td class='details-control'></td>";
				// 	echo "<td>".$row['LastName']."</td>";
				// 	echo "<td>".$row['Title']."</td>";
				// 	echo "<td>".$row['Extension']."</td>";
				// 	echo "<input type='hidden' id='fullName' values='$row[FirstName] $row[LastName]'>";
				// 	echo "<input type='hidden' id='birthDate' value='$row[BirthDate]'>";
				// 	echo "<input type='hidden' id='address' value='$row[Address]'>";
				// 	echo "<input type='hidden' id='city' value='$row[City]'>";
				// 	echo "<input type='hidden' id='homePhone' value='$row[HomePhone]'>";
				// 	echo "</tr>";
				// }
				// mysqli_free_result($result);
				// mysqli_close($db);
				$conn = new PDO("mysql:host=$host;dbname=$dbname;",$username, $password);
				$query = "SELECT * FROM employees";
				$result = $conn->query($query);
				foreach($result as $row){
					echo "<tr>";
					echo "<td class='details-control'>";
					echo "<input type='hidden' id='fullName' value='$row[2] $row[1]'>";
					echo "<input type='hidden' id='birthDate' value='$row[5]'>";
					echo "<input type='hidden' id='address' value='$row[7]'>";
					echo "<input type='hidden' id='city' value='$row[8]'>";
					echo "<input type='hidden' id='homePhone' value='$row[12]'>";
					echo "</td>";
					echo "<td>".$row[1]."</td>";
					echo "<td>".$row[3]."</td>";
					echo "<td>".$row[13]."</td>";
					echo"</tr>";
				}
				$result = null;
				$conn = null;
			?>
		</tbody>
		<tfoot>
			<tr>
                <th></th>
				<th>Last Name</th>
				<th>Title</th>
				<th>Extension</th>
			</tr>
		</tfoot>
	</table>
	</div>
    <script type="text/javascript">

	    $(document).ready(function(){
			var table = $('#listEmployee').DataTable();
			
            function format ( fullName, birthDate, address, city, homePhone ) {
			return '<table class="table" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
				'<tbody>'+
                '<tr>'+
                    '<td>Full Name:</td>'+
                    '<td>'+fullName+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td>Birth Date:</td>'+
                    '<td>'+birthDate+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td>Address:</td>'+
                    '<td>'+address+'</td>'+
				'</tr>'+
				'<tr>'+
                    '<td>City:</td>'+
                    '<td>'+city+'</td>'+
				'</tr>'+
				'<tr>'+
                    '<td>Home Phone:</td>'+
                    '<td>'+homePhone+'</td>'+
				'</tr>'+
				'</tbody>'+
			'</table>';
			}
			
			$('#listEmployee tbody').on('click', 'td.details-control', function () {
				var tr = $(this).closest('tr');
				var row = table.row( tr );
				var fullName = $(this).find('#fullName').val();
				var birthDate = $(this).find('#birthDate').val();
				var address = $(this).find('#address').val();
				var city = $(this).find('#city').val();
				var homePhone = $(this).find('#homePhone').val();
		
				if ( row.child.isShown() ) {
					row.child.hide();
					tr.removeClass('shown');
				}
				else {
					row.child( format(fullName, birthDate, address, city, homePhone) ).show();
					tr.addClass('shown');
				}
			} );

		});
	</script>
</body>
</html>