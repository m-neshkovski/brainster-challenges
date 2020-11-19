<?php


namespace Market;



use Market\Total;

class Stall implements Total {
    private $code; // Each market stall has its own code
    private $products; // Array of products that are on that shelf

    public function __construct(string $code) // as said in the exercise each stall has its own code
    {
        $this->code = $code; // the code
        $this->products = []; // place to put products in
    }

    public function setCode(string $new_code) {
        $this->code = $new_code; // in case we need to change the code
    }

    public function getCode() {
        return $this->code; // get the code
    }

    public function addProduct(Product $product_to_add) { // add some product to the stall
        if ($product_to_add instanceof Product) { // it needs to be an object of Product class
            $this->products[$product_to_add->getName()] = $product_to_add;
            // Array products is an associative array ['product name' => $product]
        } else {
            // not needed but an error is printed if $product_to_add is not an object from Product class  
            echo "Error: Yor are trying to add wrong type of object!!!";
        }
        
    }

    public function getProducts() { // to see what products are in the stall
        return $this->products;
    }

    // other methods that are needed

    public function total()
    {   
        $temp = 0;
        foreach ($this->products as $product) {
            $temp = $temp + $product->total();
        }
        return $temp;
    }


}


?>