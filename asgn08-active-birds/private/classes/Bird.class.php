<?php

class Bird {

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
  while($record = $result->fetch_assoc()) {
    $objectArray[] = self::instantiate($record);
  }

  $result->free();
  return $objectArray;
}

static public function findAll() {
  $sql = "SELECT * FROM birds";
  $result = self::findBySQL($sql);
  return $result;
}

static public function findByID($id) {
  $sql = "SELECT * FROM birds ";
  $sql .= "WHERE id='" . self::$database->escape_string($id) . "'";

  $objectArray = self::findBySQL($sql);
  if(!empty($objectArray)) {
    return array_shift($objectArray);
  }
  else {
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
  public $common_name;
  public $habitat;
  public $food;
  public $backyard_tips;
  public $conservation_id;

 
  /*
  Create a protected constant array called CONSERVATION_OPTIONS using the following scale.
  Use the CONDITION_OPTIONS from the bicycle.class.php file

  1 = Low concern
  2 = Moderate concern
  3 = Extreme concern
  4 = Extinct
  */
  protected const CONSERVATION_OPTIONS = array(
    1 => 'Low concern',
    2 => 'Moderate concern',
    3 => 'Extreme concern',
    4 => 'Extinct'
  );

 

 /*
   - Create a public __contruct that accepts a list of $args[]
   - Use the Null coalescing operator
   - Create a default value of 1 for conservation_id
 */
  public function __construct($args=[]) {
    $this->id = $args['id'] ?? '';
    $this->common_name = $args['common_name'] ?? '';
    $this->habitat = $args['habitat'] ?? '';
    $this->food = $args['food'] ?? '';
    $this->backyard_tips = $args['backyard_tips'] ?? '';
    $this->conservation_id = $args['conservation_id'] ?? 1;
  }

  /*
  Create a public method called conservation() that returns the value of the
    conservation_id property
  */
  public function conservation() {
    return $this->conservation_id;
  }

  /*
  Create a public method called conservation_text() that returns the value of the
    conservation_id property using the CONSERVATION_OPTIONS array
  */
  public function conservation_text() {
    return self::CONSERVATION_OPTIONS[$this->conservation_id];
  }



/*
  Create a public method called conservation(). This method should mimic the
    public function condition() from the bicycle.class.php file
*/
public function condition() {
  if($this->conservation_id > 0) {
    return self::CONSERVATION_OPTIONS[$this->conservation_id];
  }
  else {
    return "Unknown";
  }
}


}

?>
