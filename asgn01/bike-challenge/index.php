<?php

class Bicycle {
  
  const CONVERSION_RATIO = 2.2046226218;
  var $brand;
  var $model;
  var $year;
  var $description = 'Used Bicycle';
  var $weight_kg = 0.0;

  function name(){
    return $this->year ." ". $this->brand ." ". $this->model;
  }

  function weight_lbs() {
    return floatval($this->weight_kg) * self::CONVERSION_RATIO;
  }

  function set_weight_lbs($value){
    $this->weight_kg = floatval($value) / self::CONVERSION_RATIO;
  }

}

$trek = new Bicycle;
$trek->brand = 'Trek';
$trek->model = 'Emonda';
$trek->year = '2017';
$trek->weight_kg = 1.0;

$cd = new Bicycle;
$cd->brand = 'Cannondale';
$cd->model = 'Synapse';
$cd->year = '2016';
$cd->weight_kg = 8.0;

echo $trek->name() . "<br />";
echo $trek->weight_kg . "<br />";
echo $trek->weight_lbs() . "<br />";


echo $cd->name() . "<br />";
$trek->set_weight_lbs(2);
echo $trek->weight_kg . "<br />";
echo $trek->weight_lbs() . "<br />";

?>
