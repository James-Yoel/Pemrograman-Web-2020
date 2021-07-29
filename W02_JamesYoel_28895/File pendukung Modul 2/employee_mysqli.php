<!DOCTYPE html>
<html>
<head>
		<title> Tugas Pendahuluan</title>

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
					<li class="navbar-right active"><a href="#"> Products</a></li>
				</ul>
			</div>
		</nav>
	</header>

	<table>
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
				//Ini adalah lokasi dari mysql berada
				$host = "localhost";

				//Ini adalah user yang digunakan untuk login ke dalam module mysql / mariadb
				$username = "root";

				//Ini adalah nama database yang digunakan dalam praktikum ini 
				$dbname = "northwind";

				//Ini adalah password yang untuk autentikasi user
				$password = "root";

				//Object database
				$db = new mysqli($host, $username, $password, $dbname);

				$query = "SELECT * FROM products LIMIT 12";
				$result = $db->query($query);

				while ($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row['id'] . "</td>";
					echo "<td>" . $row['product_name'] . "</td>";
					echo "<td>" . $row['quantity_per_unit'] . "</td>";
					echo "<td>" . $row['list_price'] . "</td>";
					echo "<td>" . $row['reorder_level'] . "</td>";
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