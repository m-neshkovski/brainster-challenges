<?php 

class Bench extends Sofa {

    protected $seat_material;
    protected $legs_material;
    protected $is_legs_retractable = false;

    public function __construct(string $name, float $width, float $height, float $depth) {
        parent::__construct($name, $width, $height, $depth);
        parent::set_is_for_seat(true);
    }

    public function setSeat_material(string $seat_material) {
        $this->seat_material = $seat_material;
    }

    public function getSeat_material() {
        return $this->seat_material;
    }
    
    public function setLegs_material(string $legs_material) {
        $this->legs_material = $legs_material;
    }

    public function getLegs_material() {
        return $this->legs_material;
    }
    
    public function set_is_legs_retractable(bool $is_legs_retractable) {
        $this->is_legs_retractable = $is_legs_retractable;
    }

    public function get_is_legs_retractable() {
        return $this->is_legs_retractable;
    }


}

?>