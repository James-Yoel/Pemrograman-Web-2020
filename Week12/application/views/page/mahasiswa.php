<!DOCTYPE html>
<html>
<head>
    <title>List Mahasiswa</title>
    <?php echo $style; ?>
</head>
<body>
    <?php echo $navbar;?>
    <div class="container" style="margin-top: 10px;">
        <table class="table table-striped table-bordered" id="listMahasiswa" style="width: 100%;">
            <thead>
                <tr>
                    <th>Nama Mahasiswa</th>
                    <th>Nomor Induk Mahasiswa</th>
                    <th>Email Mahasiswa</th>
                    <th>Tugas</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>Grade</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($mahasiswa as $row){
                    $total = ($row['tugas_mahasiswa']*0.3) + ($row['uts_mahasiswa']*0.3) + ($row['uas_mahasiswa']*0.4);
                    if($total >= 80){
                        $grade = 'A';
                    }
                    else if($total >= 60){
                        $grade = 'B';
                    }
                    else if($total >= 40){
                        $grade = 'C';
                    }
                    else{
                        $grade = 'D';
                    }
                    ?>
                    <tr>
                        <td class="text-center" style="vertical-align: middle;"><?php echo $row['fname_mahasiswa']." ".$row['lname_mahasiswa']; ?></td>
                        <td class="text-center" style="vertical-align: middle;"><?php echo $row['nomorinduk_mahasiswa']; ?></td>
                        <td class="text-center" style="vertical-align: middle;"><?php echo $row['email_mahasiswa']; ?></td>
                        <td class="text-center" style="vertical-align: middle;"><?php echo $row['tugas_mahasiswa']; ?></td>
                        <td class="text-center" style="vertical-align: middle;"><?php echo $row['uts_mahasiswa']; ?></td>
                        <td class="text-center" style="vertical-align: middle;"><?php echo $row['uas_mahasiswa']; ?></td>
                        <td class="text-center" style="vertical-align: middle;"><?php echo $grade; ?></td>
                        <td class="text-center" style="vertical-align: middle;">
                            <?php echo form_open('Mahasiswa/deleteMahasiswa'); ?>
                            <input type="hidden" name="id" value="<?php echo $row['id_mahasiswa']; ?>">
                            <button type="submit" style="background: none; border: none;"><span style="color: blue;">&times;</span></button>
                        </td>
                    </tr>
                <?php
                } ?>
            </tbody>
            <tfoot>
                <td>Nama Mahasiswa</td>
                <td>Nomor Induk Mahasiswa</td>
                <td>Email Mahasiswa</td>
                <td>Tugas</td>
                <td>UTS</td>
                <td>UAS</td>
                <td>Grade</td>
                <td>Action</td>
            </tfoot>
        </table>
    </div>
    <?php echo $footer; ?>
    <?php echo $script; ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#listMahasiswa').DataTable();
        });
    </script>
</body>
</html>