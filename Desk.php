<?php 

class Desk extends Furniture {

    protected $work_area_material;
    protected $legs_material;
    protected $has_drawers = false;

    public function __construct(string $name, float $width, float $height, float $depth) {
        parent::__construct($name, $width, $height, $depth);
    }

    public function setWork_area_material(string $work_area_material) {
        $this->work_area_material = $work_area_material;
    }

    public function getWork_area_material() {
        return $this->work_area_material;
    }
    
    public function setLegs_material(string $legs_material) {
        $this->legs_material = $legs_material;
    }

    public function getLegs_material() {
        return $this->legs_material;
    }
    
    public function set_has_drawers(bool $has_drawers) {
        $this->has_drawers = $has_drawers;
    }

    public function get_has_drawers() {
        return $this->has_drawers;
    }


}

?>