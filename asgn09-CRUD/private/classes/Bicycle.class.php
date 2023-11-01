<?php

class Bicycle extends DatabaseObject {

  static protected $tableName = "bicycles";
  static protected $dbColumns = ['id', 'brand', 'model', 'year', 'category', 'color', 'gender', 'price', 'weight_kg', 'condition_id', 'description'];

  ////Non active record code

  public $id;
  public $brand;
  public $model;
  public $year;
  public $category;
  public $color;
  public $description;
  public $gender;
  public $price;
  public $weight_kg;
  public $condition_id;


  public const CATEGORIES = array('Road', 'Mountain', 'Hybrid', 'Cruiser', 'City', 'BMX');
  public const GENDERS = array('Mens', 'Womens', 'Unisex');

  //Condition Constants, used in condition() method
  //it's an enumeration of the possible values for the condition_id property
  public const CONDITION_OPTIONS = array(
    1 => 'Beat up',
    2 => 'Decent',
    3 => 'Good',
    4 => 'Great',
    5 => 'Like new'
  );

  public function __construct($args=[]) {
    $this->brand = $args['brand'] ?? '';
    $this->model = $args['model'] ?? '';
    $this->year = $args['year'] ?? '';
    $this->category = $args['category'] ?? '';
    $this->color = $args['color'] ?? '';
    $this->description = $args['description'] ?? '';
    $this->gender = $args['gender'] ?? '';
    $this->price = $args['price'] ?? 0;
    $this->weight_kg = $args['weight_kg'] ?? 0.0;
    $this->condition_id = $args['condition_id'] ?? 3;
  }

  // Getter and Setter Methods
  public function weight_kg() {
    return number_format($this->weight_kg, 2) . ' kg';
  }

  public function set_weight_kg($value) {
    $this->weight_kg = floatval($value);
  }

  //Get and Set weight in pounds
  public function weight_lbs() {
    $weight_lbs = floatval($this->weight_kg) * 2.2046226218;
    return number_format($weight_lbs, 2) . ' lbs';
  }

  public function set_weight_lbs($value) {
    $this->weight_kg = floatval($value) / 2.2046226218;
  }

  //Checks the condition_id and returns
  //the corresponding string value from the
  //condition_options array
  public function condition() {
    if($this->condition_id > 0) {
      return self::CONDITION_OPTIONS[$this->condition_id];
    } else {
      return "Unknown";
    }
  }

  public function name() {
    return "{$this->brand} {$this->model} {$this->year}";
  }

  protected function validate() {
    $this->errors = [];
    if (is_blank($this->brand)) {
      $this->errors[] = "Brand cannot be blank.";
    }
    if (is_blank($this->model)) {
      $this->errors[] = "Model cannot be blank.";
    }
    return $this->errors;
  }

}

?>
