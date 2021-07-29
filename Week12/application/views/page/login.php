<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <?php echo $style; ?>
</head>
<body style="background: black;">
    <div id="myModalLogin" class="modal fade in" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="display: inline;">Sign In</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="display: inline;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                 </div>
                <div class="modal-body">
                    <?php echo form_open('Home/loginValidation'); ?>
                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input class="form-control" type="email" name="email" id="email" placeholder="Enter Email"/>
                    </div>
                    <div class="form-group">
                        <label for="password">Password: </label>
                        <input class="form-control" type="password" name="password" id="password" placeholder="Enter Password"/>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" style="width: 100%;">Submit</button>
                    </div>
                    <?php if(isset($error)){ ?>
                        <p class="text-danger text-center"><?php echo $error; ?></p>
                    <?php    
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <?php echo $script; ?>
    <script>

		$(document).ready(function(){
			$('#myModalLogin').modal({
				keyboard: false,
				show: true,
				backdrop: 'static'
			});
		});
	</script>
</body>
</html>