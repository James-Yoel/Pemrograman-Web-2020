<!DOCTYPE html>
<html>
<head>
	<title> Tugas Pendahuluan</title>
	<!-- Bootstrap -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Data Tables -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">
		 	$(document).ready(function() {
			    $('#example').DataTable();
			} );
	</script>
</head>
<body>
	<header>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<h4 style="color:grey"> [IF635] Web Programming </h4>
				</div>
				<ul class="navbar-nav">
					<li class="navbar-right active"><a href="#"> Employees </a></li>
				<ul>
			</div>
		</nav>
	</header>
	<table id="example">
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
				$query = "SELECT * FROM products LIMIT 12";
				$result = $db->query($query);
				while ($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>".$row['ProductID']."</td>";
					echo "<td>".$row['ProductName']."</td>";
					echo "<td>".$row['QuantityPerUnit']."</td>";
					echo "<td>".$row['UnitPrice']."</td>";
					echo "<td>".$row['UnitsInStock']."</td>";
					echo "</tr>";
				}

				mysqli_free_result($result);
				mysqli_close($db);
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
</body>
</html>