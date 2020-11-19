<?php

function cartProductCostInMarket(array $market, string $product_name, $quantity) {
    foreach($market as $stall) {
        foreach($stall->getProducts() as $product) {
            if ($product->getName() == $product_name) {
                return $quantity * $product->getPrice();
            } else {
                continue;
            }
        }
    }
}

function totalCart(array $market, array $cart) {
    $total = 0;
    foreach ($cart as $product_name => $amount_in_cart) {
        foreach($market as $stall) {
            foreach($stall->getProducts() as $product) {
                if ($product->getName() == $product_name) {
                    $total += $amount_in_cart * $product->getPrice();
                    $product->spend_from_stock($amount_in_cart);
                } else {
                    continue;
                }
            }
        }    
    }

    return number_format($total, 2);
}


?>