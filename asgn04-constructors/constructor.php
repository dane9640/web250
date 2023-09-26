<?php

class Bird {
    public $commonName;
    public $latinName;

    public function __construct($commonName, $latinName) {
        $this->commonName = $commonName;
        $this->latinName = $latinName;
    }

    public function displayInfo() {
        echo "Common Name: " . $this->commonName . "<br>Latin Name: " . $this->latinName . "<br><br>";
    }
}

// Creating two instances of the Bird class
$robin = new Bird('Robin', 'Turdus migratorius');
$easternTowhee = new Bird('Eastern Towhee', 'Pipilo erythrophthalmus');

// Optional: print out the details
$robin->displayInfo();
$easternTowhee->displayInfo();

?>

<a href="../index.html">Back to WEB-225</a>
