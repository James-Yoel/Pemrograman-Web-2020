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
	<div class="container-fluid">
		<div style="border-bottom: 1px solid black;">
			<p style="text-align: center;"> 
				<font size="7" color="black"> Add Book </font>
			</p>
		</div>
	</div>
    <div class="container" style="margin-top: 35px;">
        <?php if(isset($error)){
            echo $error;
        } ?>
        <?php echo form_open_multipart('Home/AddBook'); ?>
			<div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label"><b>Title</b></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" placeholder="Title" name="title" style="width: 470px;">
                </div>
            </div>
            <div class="form-group row">
                <label for="year" class="col-sm-2 col-form-label"><b>Year</b></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="year" placeholder="Year" name="year" style="width: 70px;">
                </div>
            </div>
            <div class="form-group row">
                <label for="publisher" class="col-sm-2 col-form-label"><b>Publisher</b></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="publisher" placeholder="Publisher" name="publisher" style="width: 470px;">
                </div>
            </div>
            <div class="form-group row">
                <label for="Author" class="col-sm-2 col-form-label"><b>Author</b></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="author" placeholder="Author" name="author" style="width: 470px;">
                </div>
            </div>
            <div class="form-group row">
                <label for="poster" class="col-md-2 col-form-label"><b>Poster</b></label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="poster" placeholder="Poster" name="poster" style="width: 470px;">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" value="Add" name="submit">Add Book</button>
            <a class="btn btn-danger" role="button" href="<?php echo base_url('index.php/Home') ?>">Cancel</a>
		<?php echo form_close(); ?>
	</div>
	<?php echo $footer; ?>
	<?php echo $script; ?>
</body>
</html>