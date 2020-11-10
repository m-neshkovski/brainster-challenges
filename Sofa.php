<?php

class Sofa extends Furniture {
    protected $seats;
    protected $arms = 0;
    protected $depth_opened;

    public function __construct(string $name, float $width, float $height, float $depth) {
        parent::__construct($name, $width, $height, $depth);
        // bidejci sofa po defolt e za sedewe a mozebi i za spiewe ja setirame po defolt za sedenje
        parent::set_is_for_seat(true);
    }

    public function setSeats(int $seats) {
        $this->seats = $seats;
    }

    public function getSeats() {
        return $this->seats;
    }
    
    public function setArms(int $arms) {
        $this->arms = $arms;
    }

    public function getArms() {
        return $this->arms;
    }

    public function setDepth_opened(bool $depth_opened) {
        $this->depth_opened = $depth_opened;
    }

    public function getDepth_opened() {
        return $this->depth_oened;
    }

    public function Area_opened() {
        if ($this->is_for_sleep) {
            return number_format($this->width * $this->depth_opened, 2);
        } else {
            return parent::Area();
        }
    }
}

?>