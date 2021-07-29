<!DOCTYPE html>
<html>
<head>
    <?php
        echo $js;
        echo $css;
    ?>
    <title>Week 09</title>
</head>
<body>
    <?php echo $header; ?>
    <div class="container" style="margin-top: 10px;">
        <h1 style="display: inline;">Manage Products</h1>
        <h4 style="display: inline; color: gray;">&nbsp;Northwind Traders</h4>
        <a class="btn btn-primary" href="<?php echo site_url('Insert') ?>" role="button" style="float: right; display: inline;"><i class="fa fa-plus-circle"></i> Product</a>
        <hr>
        <table  class="table table-striped table-bordered" id="listEmployee" style="width:100%">
            <thead>
                <tr>
                    <th></th>
                    <th>Product Name</th>
                    <th>Quantity Per Unit</th>
                    <th>Price</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($product as $row){
                    $id_product = $row['id_product'];
                    $product_name = $row['product_name'];
                    $qty_per_unit = $row['qty_per_unit'];
                    $price = $row['price'];
                    $stock = $row['stock'];

                    echo "<tr>";
                    echo "<td>".$id_product."</td>";
                    echo "<td>".$product_name."</td>";
                    echo "<td>".$qty_per_unit."</td>";
                    echo "<td>".$price."</td>";
                    echo "<td>".$stock."</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th>Product Name</th>
                    <th>Quantity Per Unit</th>
                    <th>Price</th>
                    <th>Stock</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <?php echo $footer; ?> 

    <script type="text/javascript">
        $(document).ready(function(){
            $('#listEmployee').DataTable();
        });
    </script>
</body>
</html>