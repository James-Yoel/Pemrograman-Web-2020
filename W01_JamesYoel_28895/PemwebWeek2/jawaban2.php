<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#listProduct').DataTable();
        } );
    </script>
    <?php
    $namaProduct = array(
        "Chai" => array(
            "Quantity" => "10 boxes x 20 bags",
            "Price" => 18,
            "Stock" => 39
        ),

        "Chang" => array(
            "Quantity" => "24 - 12 oz bottles",
            "Price" => 19,
            "Stock" => 17
        ),

        "Aniseed Syrup" => array(
            "Quantity" => "12 - 550 ml bottles",
            "Price" => 10,
            "Stock" => 13
        ),

        "Chef Anton's Cajun Seasoning" => array(
            "Quantity" => "48 - 6 oz jars",
            "Price" => 22,
            "Stock" => 53
        ),

        "Chef Anton's Gumbo Mix" => array(
            "Quantity" => "36 boxes",
            "Price" => 21.35,
            "Stock" => 0
        ),

        "Grandma's Boysenberry Spread" => array(
            "Quantity" => "12 - 8 oz jars",
            "Price" => 25,
            "Stock" => 120
        ),

        "Uncle Bob's Organic Dried Pears" => array(
            "Quantity" => "12 - 1 lb pkgs",
            "Price" => 30,
            "Stock" => 15
        ),

        "Northwoods Cranberry Sauce" => array(
            "Quantity" => "12 - 12 oz jars",
            "Price" => 40,
            "Stock" => 67
        ),

        "Mishi Kobe Niku" => array(
            "Quantity" => "18 - 500 g pkgs",
            "Price" => 97,
            "Stock" => 29
        ),

        "Ikura" => array(
            "Quantity" => "12 - 200 ml jars",
            "Price" => 31,
            "Stock" => 31
        ),

        "Queso Cabrales" => array(
            "Quantity" => "1 kg pkg",
            "Price" => 21,
            "Stock" => 22
        ),
        
        "Queso Manchego La Pastora" => array(
            "Quantity" => "10 - 500 g pkgs",
            "Price" => 38,
            "Stock" => 86
        )
    );
    ?>
</head>
<body>
    <nav class="nav navbar-default">
        <div class="container-fluid"> 
            <div class="navbar-header" > 
                <a class="navbar-brand" href="#">[IF635] Web Programming</a> 
            </div> 
            <div> 
                <ul class="nav navbar-nav navbar-right"> 
                    <li class="active"><a href="#">Products</a></li>
                </ul> 
            </div> 
        </div> 
    </nav>
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-12">
    <table class="table table-striped table-bordered" id="listProduct" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Quanity per Unit</th>
                <th>Price</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach($namaProduct as $n => $desc){
                echo "<tr>";
                echo "<td>".$no."</td>";
                echo "<td>".$n."</td>";
                echo "<td>".$desc["Quantity"]."</td>";
                echo "<td>".$desc["Price"]."</td>";
                echo "<td>".$desc["Stock"]."</td>";
                echo "</tr>";
                $no++;
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Quanity per Unit</th>
                <th>Price</th>
                <th>Stock</th>
            </tr>
        </tfoot>
    </table>
    </div>
    </div>
    </div>
</body>
</html>
