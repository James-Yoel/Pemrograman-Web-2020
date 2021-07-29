<?php defined('BASEPATH') OR exit('No direct script access allowed !'); ?>

<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only"> Toggle Navigation </span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo base_url(); ?>"> Quiz 2 </a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li class="active">
					<a href="<?php echo base_url(); ?>"> Book List
						<span class="sr-only">(current)</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('index.php/Home/Logout'); ?>"> Logout
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav>