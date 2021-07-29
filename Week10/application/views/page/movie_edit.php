<!DOCTYPE html>
<html>
<head>
	<title> Code Igniter MVC </title>
	<?php echo $style; ?>
</head>
<body>
	<?php echo $navbar; ?>
	<br/>
	<br/>
	<br/>
	<div class="container-fluid">
			<div style="border-bottom: 1px solid black;">
				<p style="text-align: center;"> 
					<font size="7" color="black"> Edit Movie </font>
					<font size="5" color="rgb(127,127,127)"> WebDB Cinemaks </font> 
				</p>
			</div>
	</div>
	<div class="container" style="margin-top: 35px;">
		<?php 
			if(isset($detail)){ 
				foreach($detail as $row){
					echo form_open_multipart('MoviePage/EditMovie');
		?>
			<div class="form-group row">
                <label for="movieID" class="col-sm-2 col-form-label"><b>Movie ID</b></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="movieID" placeholder="Movie ID" name="movieID" style="width: 470px;" value="<?php echo $row['MovieID']; ?>" disabled>
					<input type="hidden" name="MovieID" value="<?php echo $row['MovieID']; ?>">
				</div>
            </div>
			<div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label"><b>Title</b></label>
                <div class="col-sm-10">
					<input type="text" class="form-control" id="title" placeholder="Title" name="title" style="width: 470px;" value="<?php echo $row['Title']; ?>">
					<?php echo form_error('title'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="year" class="col-sm-2 col-form-label"><b>Year</b></label>
                <div class="col-sm-10">
					<input type="text" class="form-control" id="year" placeholder="Year" name="year" style="width: 70px;" value="<?php echo $row['Year']; ?>">
					<?php echo form_error('year'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="director" class="col-sm-2 col-form-label"><b>Director</b></label>
                <div class="col-sm-10">
					<input type="text" class="form-control" id="director" placeholder="Director" name="director" style="width: 470px;" value="<?php echo $row['Director']; ?>">
					<?php echo form_error('director'); ?>
				</div>
            </div>
            <div class="form-group row">
                <label for="poster" class="col-md-2 col-form-label"><b>Poster</b></label>
                <div class="col-sm-10">
					<img src="<?php echo base_url($row['PosterLink']); ?>" alt="Link Poster not found !" width="300" height="200">
					<input type="file" class="form-control" id="poster" placeholder="Poster" name="poster" style="width: 470px;">
					<input type="hidden" name="posterLama" value="<?php echo $row['PosterLink'] ?>">
					<?php echo form_error('poster'); ?>
                </div>
            </div>
			<button type="submit" class="btn btn-primary" value="Edit" name="submit">Edit Movie</button> 
            <a class="btn btn-danger" role="button" href="<?php echo site_url('MoviePage') ?>">Cancel</a>
		<?php }} ?>
		<?php echo form_close(); ?>
	</div>
	<?php echo $footer; ?>
	<?php echo $script; ?>
</body>
</html>