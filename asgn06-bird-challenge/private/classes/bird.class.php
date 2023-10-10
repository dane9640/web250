<?php

class Bird {

/*
Use the wnc-birds.csv file to create the properties
Make all of the properties public.
*/
  public $common_name;
  public $habitat;
  public $food;
  public $nest_placement;
  public $behavior;
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
    $this->common_name = $args['common_name'] ?? '';
    $this->habitat = $args['habitat'] ?? '';
    $this->food = $args['food'] ?? '';
    $this->nest_placement = $args['nest_placement'] ?? '';
    $this->behavior = $args['behavior'] ?? '';
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
