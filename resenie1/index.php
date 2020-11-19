<?php

require './bootstrap.php';

use \Market\Product;
use \Market\Stall;
use \Market\Orange;
use \Market\Kiwi;
use \Market\Potato;
use \Market\Pepper;
use \Market\Nuts;
use \Market\Raspberry;

$orange = new Orange ('Orange', 35, 'kg');
$orange->setIn_stock(100.000);
$potato = new Potato ('Potato', 240, 'sack');
$potato->setIn_stock(10);
$nuts = new Nuts ('Nuts', 850, 'kg');
$nuts->setIn_stock(25.000);
$kiwi = new Kiwi ('Kiwi', 670, 'sack');
$kiwi->setIn_stock(60);
$pepper = new Pepper ('Pepper', 330, 'sack');
$pepper->setIn_stock(20);
$raspberry = new Raspberry ('Raspberry', 555, 'kg');
$raspberry->setIn_stock(100.000);

$stall1 = new Stall('A01');
$stall1->addProduct($orange);
$stall1->addProduct($potato);
$stall1->addProduct($nuts);

$stall2 = new Stall('A02');
$stall2->addProduct($kiwi);
$stall2->addProduct($pepper);
$stall2->addProduct($raspberry);

$market = [$stall1, $stall2];

$cart = [
    'Orange' => 3.000,
    'Pepper'=> 1,
    'Kiwi' => 1,
    'Nuts' => 0.500
];

// echo '<pre>';
// print_r($market);






?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Challange 13 PHP OOP 2</title>
  </head>
  <body>
    <h1 class="text-center my-3">Challange 13 PHP OOP 2</h1>
    <h2 class="text-center mb-5">Market Nekoj</h2>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center">Before change</h3>

            </div>
            <?php foreach($market as $stall) { ?>
                <div class="col-6">
                <h3 class="text-center">Stall <?php echo $stall->getCode(); ?></h3>
                <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Unit</th>
                    <th scope="col" class="text-right">Price/Unit(MKD)</th>
                    <th scope="col" class="text-right">Total Value(MKD)</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    // echo '<pre>';
                    // print_r($stall->getProducts());
                    foreach($stall->getProducts() as $product_name => $product) { ?> 
                    
                        <tr>
                            <th scope="row"><?php echo $product->getName() ?></th>
                            <td><?php echo $product->getIn_stock() ?></td>
                            <td><?php echo $product->getMeasure() ?></td>
                            <td class="text-right"><?php echo $product->getPrice() ?> MKD</td>
                            <td class="text-right"><?php echo $product->total() ?> MKD</td>

                        </tr>
                    
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" class="text-right">Total Stall Value</th>
                        <td class="text-right"><?php echo $stall->total() ?> MKD</td>
                    </tr>
                </tfoot>
                </table>
                </div>
            <?php } ?> 
        </div>
        <hr>
        <?php
        $cart = [
            'Orange' => 3.000,
            'Pepper'=> 1,
            'Kiwi' => 1,
            'Nuts' => 0.500
        ];

        // echo '<br><br>';
        // echo "Cart total is " . totalCart($market, $cart) . "MKD";

        ?>

        <div class="row">
            <div class="col-4 offset-4">
                <h3 class="text-center">Cart</h3>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col" class="text-right">Quantity</th>
                            <th scope="col" class="text-right">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cart as $product_name => $quantity) { ?>
                            <tr>
                                <td><?php echo $product_name ?></td>
                                <td class="text-right"><?php echo $quantity ?></td>
                                <td class="text-right"><?php echo number_format(cartProductCostInMarket($market, $product_name, $quantity), 2) ?> MKD</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="row" colspan="2" class="text-right">Cart total value is: </th>
                            <td class="text-right"><?php echo totalCart($market, $cart) ?> MKD</td>
                        </tr>
                    </tfoot>

                </table>
            </div>

        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <h3 class="text-center">After change</h3>
            </div>
            <?php foreach($market as $stall) { ?>
                <div class="col-6">
                <h3 class="text-center">Stall <?php echo $stall->getCode(); ?></h3>
                <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Unit</th>
                    <th scope="col" class="text-right">Price/Unit(MKD)</th>
                    <th scope="col" class="text-right">Total Value(MKD)</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    // echo '<pre>';
                    // print_r($stall->getProducts());
                    foreach($stall->getProducts() as $product_name => $product) { ?> 
                    
                        <tr>
                            <th scope="row"><?php echo $product->getName() ?></th>
                            <td><?php echo $product->getIn_stock() ?></td>
                            <td><?php echo $product->getMeasure() ?></td>
                            <td class="text-right"><?php echo $product->getPrice() ?> MKD</td>
                            <td class="text-right"><?php echo $product->total() ?> MKD</td>

                        </tr>
                    
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" class="text-right">Total Stall Value</th>
                        <td class="text-right"><?php echo $stall->total() ?> MKD</td>
                    </tr>
                </tfoot>
                </table>
                </div>
            <?php } ?> 
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>