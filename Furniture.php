<?php

class Furniture {
    public $name; // dodadeno radi kontekst i za printanje
    public $width; // vo metri
    public $height; // vo metri
    public $depth; // vo metri
    protected $is_for_seat = false;
    protected $is_for_sleep = false;

    public function __construct(string $name, float $width, float $height, float $depth)
    {
        $this->name = $name;
        $this->width = number_format($width, 2);
        $this->height = number_format($height, 2);
        $this->depth = number_format($depth, 2);
    }

    public function set_is_for_seat(bool $is_for_seat) {
        $this->is_for_seat = $is_for_seat;
    }
    
    public function get_is_for_seat() {
        return $this->is_for_seat;
    }

    public function set_is_for_sleep(bool $is_for_sleep) {
        $this->is_for_sleep = $is_for_sleep;
    }

    public function get_is_for_sleep() {
        return $this->is_for_sleep;
    }

    public function Area() {
        return number_format($this->width * $this->depth, 2);
    }

    public function Volume() {
        return number_format($this->Area() * $this->height, 2);
    }

}

?>