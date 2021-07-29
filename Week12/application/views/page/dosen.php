<!DOCTYPE html>
<html>
<head>
    <title>List Dosen Pengajar</title>
    <?php echo $style; ?>
</head>
<body>
    <?php echo $navbar;?>
    <div class="container" style="margin-top: 10px;">
        <table class="table table-striped table-bordered" id="listDosen" style="width: 100%;">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Nomor Induk Dosen</th>
                    <th>Email</th>
                    <th>Foto</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($dosen as $row){?>
                    <tr>
                        <td class="text-center" style="vertical-align: middle;"><?php echo $row['fname_dosen']." ".$row['lname_dosen']; ?></td>
                        <td class="text-center" style="vertical-align: middle;"><?php echo $row['nomorinduk_dosen']; ?></td>
                        <td class="text-center" style="vertical-align: middle;"><?php echo $row['email_dosen']; ?></td>
                        <td class="text-center">
                            <img src="<?php echo $row['foto_dosen']; ?>" alt="Foto Dosen" width="150" height="200">
                        </td>
                        <td class="text-center" style="vertical-align: middle;">
                            <?php echo form_open('Dosen/deleteDosen'); ?>
                            <input type="hidden" name="id" value="<?php echo $row['id_dosen']; ?>">
                            <button type="submit" style="background: none; border: none;"><span style="color: blue;">&times;</span></button>
                        </td>
                    </tr>
                <?php
                } ?>
            </tbody>
            <tfoot>
                <td>Nama</td>
                <td>Nomor Induk Dosen</td>
                <td>Email</td>
                <td>Foto</td>
                <td>Action</td>
            </tfoot>
        </table>
    </div>
    <?php echo $footer; ?>
    <?php echo $script; ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#listDosen').DataTable();
        });
    </script>
</body>
</html>