<?php

class Bicycle {

  static protected $database;

  static public function setDatabase($database) {
    self::$database = $database;
  }

  static public function findBySQL($sql) {
    $result = self::$database->query($sql);

    if(!$result) {
      exit("Database query failed.");
    }

    $objectArray = [];
    while($record = $result->fetch_assoc()){
      $objectArray[] = self::instantiate($record);
    }

    $result->free();

    return $objectArray;
  }

  static public function findAll() {
    $sql = "SELECT * FROM bicycles";
    $result = self::findBySQL($sql);
    return $result;
  }

  static public function findByID($id) {
    $sql = "SELECT * FROM bicycles ";
    $sql .= "WHERE id='" . self::$database->escape_string($id) . "'";

    $objectArray = self::findBySQL($sql);
    if (!empty($objectArray)) {
      return array_shift($objectArray);
    } else {
      return false;
    }
  }

  static protected function instantiate($record) {
    $object = new self;

    foreach($record as $property => $value) {
      if(property_exists($object, $property)) {
        $object->$property = $value;
      }
    }

    return $object;
  }

  public $id;
  public $brand;
  public $model;
  public $year;
  public $category;
  public $color;
  public $description;
  public $gender;
  public $price;

  protected $weight_kg;
  protected $condition_id;

  public const CATEGORIES = array('Road', 'Mountain', 'Hybrid', 'Cruiser', 'City', 'BMX');
  public const GENDERS = array('Mens', 'Womens', 'Unisex');

  //Condition Constants, used in condition() method
  //it's an enumeration of the possible values for the condition_id property
  protected const CONDITION_OPTIONS = array(
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

}

?>
