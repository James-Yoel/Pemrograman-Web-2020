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
        <h1 style="display: inline;">Add Product</h1>
        <h4 style="display: inline; color: gray;">&nbsp;Northwind Traders</h4>
        <hr>
        <form action="Insert/insert_action" method="post" name="formInsert">
            <div class="form-group row">
                <label for="product_name" class="col-sm-2 col-form-label"><b>Product Name</b></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="product_name" placeholder="Product Name" name="product_name" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="supplier" class="col-sm-2 col-form-label"><b>Supplier</b></label>
                <div class="col-sm-10">
                    <select id="supplier" name="id_supplier" class="form-control">
                    <?php
                        foreach($supplier as $rowSupplier){
                            $supplier_id = $rowSupplier['id_supplier'];
                            $supplier_name = $rowSupplier['supplier_name'];
                            ?>
                            <option value="<?php echo $supplier_id; ?>"><?php echo $supplier_name; ?></option>
                            <?php
                        }
                    ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="category" class="col-sm-2 col-form-label"><b>Category</b></label>
                <div class="col-sm-10">
                    <select id="category" name="id_category" class="form-control">
                    <?php
                        foreach($category as $rowCategory){
                            $category_id = $rowCategory['id_category'];
                            $category_name = $rowCategory['category_name'];
                            ?>
                            <option value="<?php echo $category_id; ?>"><?php echo $category_name; ?></option>
                            <?php
                        }
                    ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="qty_per_unit" class="col-md-2 col-form-label"><b>Quantity Per Unit</b></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="qty_per_unit" placeholder="Quantity Per Unit" name="qty_per_unit" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label"><b>Price</b></label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="price" placeholder="Price" name="price" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="stock"  class="col-sm-2 col-form-label"><b>Stock</b></label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="stock" placeholder="Stock" name="stock" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" value="Add" name="Submit">Submit</button>
            <a class="btn btn-default" role="button" href="<?php echo site_url('Home') ?>">Cancel</a>
        </form>
    </div>
    <?php echo $footer; ?>
</body>
</html>