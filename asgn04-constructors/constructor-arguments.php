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

// Creating two instances of the Bird class
$flyCatcher = new Bird(['commonName' =>'Acadian Flycatcher', 'latinName' => 'Empidonax Virescens']);
$wren = new Bird(['commonName' =>'Carolina Wren', 'latinName' => 'Thryothorus ludovicianus']);

// Optional: print out the details
$flyCatcher->displayInfo();
$wren->displayInfo();

?>
