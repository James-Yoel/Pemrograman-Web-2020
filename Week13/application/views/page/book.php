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
    <br/>
    <a href="<?php echo base_url('index.php/Home/bookadd'); ?>" style="float:right;margin-right: 15px;">
		<button class="btn btn-primary"> 
			<span class="glyphicon glyphicon-plus"></span>
			Book
		</button>
	</a>
	<br/>
	<br/>
	<br/>

    <table id="tblbook" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th></th>
                <th>Title</th>
                <th>Year</th>
                <th>Author</th>
                <th>Publisher</th>
                <th>Poster</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if(isset($book)){
                    foreach($book as $row){?>
                        <tr>
                            <td><?php echo $row['BookID']; ?></td>
                            <td><?php echo $row['Title']; ?></td>
                            <td><?php echo $row['Year']; ?></td>
                            <td><?php echo $row['Author']; ?></td>
                            <td><?php echo $row['Publisher']; ?></td>
                            <td><img src="<?php echo base_url("assets/poster/".$row['PosterLink']); ?>" alt="Poster Buku" width="50" height="100"></td>
                            <td>
                                <a href="<?php echo base_url("index.php/Home/bookview?id=".$row['BookID'].""); ?>" style="margin-right: 10px; color: rgb(0,200,255);">
                                    <button class="btn">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </a>
                                <a href="<?php echo base_url("index.php/Home/bookedit?id=".$row['BookID'].""); ?>" style="margin-right: 10px; color: rgb(255,215,0);">
                                    <button class="btn">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </button>
                                </a>
                                <a href="<?php echo base_url("index.php/Home/bookdelete?id=".$row['BookID'].""); ?>" style="margin-right: 10px; color: rgb(255,0,0);">
                                    <button class="btn">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                <?php
                    }
                }
            ?>
        </tbody>
        <tfoot>
            <td></td>
            <td>Title</td>
            <td>Year</td>
            <td>Author</td>
            <td>Publisher</td>
            <td>Poster</td>
            <td>Action</td>
        </tfoot>
    </table>

    <div id="myModalLogin" class="modal fade in" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="display: inline;">Masukkan Password</h4>
                 </div>
                <div class="modal-body">
                    <?php echo form_open('Home/Login'); ?>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" id="password" placeholder="Enter Password"/>
                    </div>
                    <div class="modal-footer"  style="text-align: center;">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <?php if(isset($error)){ ?>
                        <p class="text-danger text-center"><?php echo $error; ?></p>
                    <?php    
                    } ?>
                </div>
            </div>
        </div>
    </div>

    <?php echo $footer; ?>
	<?php echo $script; ?>

    <script>
        $(document).ready(function(){
            $('#tblbook').DataTable();
            <?php 
                if($user == FALSE){ ?>
                    $('#myModalLogin').modal({
                        keyboard: false,
                        show: true,
                        backdrop: 'static'
                    });
            <?php
                }
            ?>
        })
    </script>

</body>
</html>