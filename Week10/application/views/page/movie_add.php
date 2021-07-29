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
					<font size="7" color="black"> Add Movie </font>
					<font size="5" color="rgb(127,127,127)"> WebDB Cinemaks </font> 
				</p>
			</div>
	</div>
    <div class="container" style="margin-top: 35px;">
        <?php echo validation_errors(); echo form_open_multipart('MoviePage/addMovie'); ?>
			<div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label"><b>Title</b></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" placeholder="Title" name="title" style="width: 470px;">
                    <?php echo form_error('title'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="year" class="col-sm-2 col-form-label"><b>Year</b></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="year" placeholder="Year" name="year" style="width: 70px;">
                    <?php echo form_error('year'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="director" class="col-sm-2 col-form-label"><b>Director</b></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="director" placeholder="Director" name="director" style="width: 470px;">
                    <?php echo form_error('director'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="poster" class="col-md-2 col-form-label"><b>Poster</b></label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="poster" placeholder="Poster" name="poster" style="width: 470px;">
                    <?php echo form_error('poster'); ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" value="Add" name="submit">Add Movie</button>
            <a class="btn btn-danger" role="button" href="<?php echo site_url('MoviePage') ?>">Cancel</a>
		<?php echo form_close(); ?>
	</div>
	<?php echo $footer; ?>
	<?php echo $script; ?>
</body>
</html>