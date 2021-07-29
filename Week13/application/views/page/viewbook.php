<!DOCTYPE html>
<html>
<head>
	<title>Quiz 2</title>
	<?php echo $style; ?>
</head>
<body>
	<?php echo $navbar; ?>
	<br/>
	<br/>
	<br/>
	<?php 
		foreach($detail as $row){
	?>	
	<div class="container-fluid">
			<div style="border-bottom: 1px solid black;">
				<p style="text-align: center;"> 
					<font size="7" color="black"> <?php echo $row['Title']; ?> </font>
					<font size="5" color="rgb(127,127,127)"> Book Details </font> 
					<a href="<?php echo base_url('index.php/Home/book'); ?>" style="float:right;margin-right: 15px;margin-top: 35px;">
						<button class="btn btn-primary"> 
							<span class="glyphicon glyphicon-menu-left"></span>
							Back
						</button>
					</a>
				</p>
			</div>
	</div>
	<br/>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<p style="font-size: 25px;color: rgb(127,127,127);"> Released : <?php  echo $row['Year'];  ?> </p>
				<p style="font-size: 25px;color: rgb(127,127,127);"> Publisher : <?php  echo $row['Publisher'] ?> </p>
                <p style="font-size: 25px;color: rgb(127,127,127);"> Author : <?php  echo $row['Author'] ?> </p>
			</div>
			<div class="col-md-6">
				<img src="<?php echo base_url("assets/poster/".$row['PosterLink']); ?>" alt="Poster not found !" width="300" height="400">
			</div>
		</div>
	</div>
	<?php } ?>
	<?php echo $footer; ?>
	<?php echo $script; ?>
</body>
</html>