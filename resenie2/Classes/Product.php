<?php

namespace Market;

use \Market\Total;

abstract class Product implements Total {

    private $name;
    private $sold_in_kg = false;
    private $sold_in_sack = false;
    
    public function __construct(string $name, string $kg_or_sack)
    {
        $this->name = $name;

        switch ($kg_or_sack) {
            case 'kg':
                $this->sold_in_kg = true;
                break;
            case 'sack':
                $this->sold_in_sack = true;
                break;
            default:
                die("ERROR!! Specify 'kg' or 'sack' as a second argument of constructor");
                break;
        }
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setMeasure($kg_or_sack) { // if we need to change a measure of the product
        if ($kg_or_sack == 'kg') {
            $this->sold_in_kg = true;
            $this->sold_in_sack = false;
        } else if ($kg_or_sack == 'sack') {
            $this->sold_in_kg = false;
            $this->sold_in_sack = true;
        } else {
            echo "ERROR!! Specify 'kg' or 'sack' as argument in setMeasure";
        }
    }

    public function getMeasure() { // it will be usefull for dinamic printing of comments later
        if ($this->sold_in_kg) {
            return 'kg';
        } else if ($this->sold_in_sack) {
            return 'gunny sack';
        } else {
            return 'Error: unexpected measure, object has wrong properties!!!';
        }
    }

    public function is_sold_in_kg() {
        return $this->sold_in_kg;
    }
    
    public function is_sold_in_sack() {
        return $this->sold_in_sack;
    }
    
    abstract public function total();
}



?>