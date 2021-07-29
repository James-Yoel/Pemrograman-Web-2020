<!DOCTYPE html>
<html>
<head>
	<title>MVC Model</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
	<style>
	td.details-control {
		background: url('../details_open.png') no-repeat center center;
		cursor: pointer;
	}
	tr.shown td.details-control {
		background: url('../details_close.png') no-repeat center center;
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
			<tr>
				<td class='details-control'>
					<input type='hidden' id='fullName' value=' <?php echo $employee->getLastName()." ".$employee->getFirstName()?>'>
					<input type='hidden' id='birthDate' value=' <?php echo $employee->getBirthDate()?>'>
					<input type='hidden' id='address' value='<?php echo $employee->getAddress()?>'>
					<input type='hidden' id='city' value='<?php echo $employee->getCity()?>'>
					<input type='hidden' id='homePhone' value='<?php echo $employee->getHomePhone()?>'>
				</td>
				<td><?php echo $employee->getLastName()?></td>
				<td><?php echo $employee->getTitle()?></td>
				<td><?php echo $employee->getExtension()?></td>
			</tr>
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