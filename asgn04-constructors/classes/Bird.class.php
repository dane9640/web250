<?php

class Bird {
  public $commonName;
  public $latinName;

  public function __construct($args=[]) {
      $this->commonName = $args['commonName'] ?? NULL;
      $this->latinName = $args['latinName'] ?? NULL;
  }

  public function displayInfo() {
      echo "Common Name: " . $this->commonName . "<br>Latin Name: " . $this->latinName . "<br><br>";
  }
}

?>