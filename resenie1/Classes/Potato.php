<?php

namespace Market;

use \Market\Product;

class Potato extends Product {

    private $in_stock;
    private $price;

    public function __construct(string $name, float $price, string $measure_kg_or_sack) {
        parent::__construct($name, $measure_kg_or_sack);
        $this->price = number_format($price, 2);
        $this->in_stock = 0;
    }

    public function setPrice(float $price) {
        $this->price = number_format($price, 2);
    }
    
    public function getPrice() {
        return $this->price;
    }

    public function setIn_stock(int $new_stock_sack) {
        $this->in_stock = number_format($new_stock_sack, 0);
    }

    public function addIn_stock(int $add_stock_sack) {
        $this->in_stock = $this->in_stock + number_format($add_stock_sack, 0);
    }

    public function spend_from_stock (int $spend_stock_sack) {
        if (! $this->in_stock > 0) {
            die ('Out of stock!!!');
        } else if ($this->in_stock < $spend_stock_sack) {
            die ('Not enough in stock!!!');
        } else {
            $this->in_stock = $this->in_stock - number_format($spend_stock_sack, 3);
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