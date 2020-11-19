<?php

namespace Market;

use \Market\Product;

class ProductInKg extends Product {

    private $in_stock;
    private $price;

    public function __construct(string $name, float $price) {
        parent::__construct($name, 'kg');
        $this->price = number_format($price, 2);
        $this->in_stock = 0;
    }

    public function setPrice(float $price) {
        $this->price = number_format($price, 2);
    }
    
    public function getPrice() {
        return $this->price;
    }

    public function setIn_stock(float $new_stock_kg) {
        $this->in_stock = number_format($new_stock_kg, 3);
    }

    public function addIn_stock(float $add_stock_kg) {
        $this->in_stock = $this->in_stock + number_format($add_stock_kg, 3);
    }

    public function spend_from_stock (float $spend_stock_kg) {
        if (! $this->in_stock > 0) {
            die ('Out of stock!!!');
        } else if ($this->in_stock < $spend_stock_kg) {
            die ('Not enough in stock!!!');
        } else {
            $this->in_stock = $this->in_stock - number_format($spend_stock_kg, 3);
        }

    }

    public function getIn_stock() {
        if ($this->in_stock != 0) {
            return $this->in_stock;
        } else {
            return 'Out of stock';
        }
    }

    public function total() {
        return $this->in_stock * $this->price;
    }

}

?>