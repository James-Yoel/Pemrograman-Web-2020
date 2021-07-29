<!DOCTYPE html>
<html>
<head>
	<title> Tugas Pendahuluan</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">
		 	$(document).ready(function() {
			    $('#listProduct').DataTable();
			} );
	</script>
</head>
<body>
	<header>
		<nav class="nav navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<h4 class="navbar-brand" style="color:grey"> [IF635] Web Programming </h4>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="#"> Employees </a></li>
				<ul>
			</div>
		</nav>
	</header>
	<div class="container" style="margin-top: 10px;">
	<table class="table table-striped table-bordered" id="listProduct" style="width:100%">
		<thead>
			<tr>
				<th> # </th>
				<th> Product Name </th>
				<th> Quantity Per Unit </th>
				<th> Price </th>
				<th> Stock </th>
			</tr>
		</thead>
		<tbody>
			<?php
				$host = "localhost";
				$username = "root";
				$dbname = "northwind";
				$password = "";
				$db = new mysqli($host, $username, $password, $dbname);
				//$conn = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);
				$query = "SELECT * FROM products LIMIT 12";
				$result = $db->query($query);
				while ($row = $result->fetch_assoc()){
					echo "<tr>";
					echo "<td>".$row['ProductID']."</td>";
					echo "<td>".$row['ProductName']."</td>";
					echo "<td>".$row['QuantityPerUnit']."</td>";
					echo "<td>".$row['UnitPrice']."</td>";
					echo "<td>".$row['UnitsInStock']."</td>";
					echo "</tr>";
				}
				//foreach ($result as $row) {
				//	echo "<tr>";
				//	echo "<td>".$row[0]."</td>";
				//	echo "<td>".$row[1]."</td>";
				//	echo "<td>".$row[4]."</td>";
				//	echo "<td>".$row[5]."</td>";
				//	echo "<td>".$row[6]."</td>";
				//	echo "</tr>";
				//}

				mysqli_free_result($result);
				mysqli_close($db);
				//$result = null;
				//$conn = null;
			?>
		</tbody>
		<tfoot>
			<tr>
				<td> # </td>
				<td> Product Name </td>
				<td> Quantity Per Unit </td>
				<td> Price </td>
				<td> Stock </td>
			</tr>
		</tfoot>
	</table>
	</div>
</body>
</html>