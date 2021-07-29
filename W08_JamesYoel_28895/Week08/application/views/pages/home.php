<!DOCTYPE html>
<html>
<head>
    <?php
        echo $js;
        echo $css;
    ?>
    <title>Week 8</title>
</head>
<body>
    <?php
        echo $header;
        echo $footer;
    ?>

    <div class="container" style="margin-top: 10px;">
        <table class="table table-striped table-bordered" id="listEmployee" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Salary</th>
                    <th>No.Telpon</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Agung W. Chandranata</td>
                    <td>Trainer</td>
                    <td>Rp. 2.100.000</td>
                    <td>087883505580</td>
                    <td>Newton Timur No.28</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Ryan Pramana</td>
                    <td>Trainer</td>
                    <td>Rp. 700.000</td>
                    <td>087883606680</td>
                    <td>Newton Barat No.29</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Johannes Immanuel</td>
                    <td>Trainer</td>
                    <td>Rp. 1.400.000</td>
                    <td>082883626682</td>
                    <td>Newton Utara No.12</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Monica Devi Kristiadi</td>
                    <td>Trainer</td>
                    <td>Rp. 2.800.000</td>
                    <td>087443606640</td>
                    <td>Newton Selatan No.1</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Wendy</td>
                    <td>Coordinator</td>
                    <td>Rp. 5.700.000</td>
                    <td>0812139927805</td>
                    <td>Newton Pusat No.14</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#listEmployee').DataTable();
        });
    </script>
</body>
</html>