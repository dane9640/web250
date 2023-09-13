<?php

//I use concepts I was aware of already in this challenge. Such as the constructors.
class Instrument {
    protected $name;
    protected $origin;

    public function __construct($name, $origin) {
        $this->name = $name;
        $this->origin = $origin;
    }

    public function play() {
        return "Playing the $this->name from $this->origin.";
    }

    public function getName() {
        return $this->name;
    }

    public function getOrigin() {
        return $this->origin;
    }

    public function setName($name) {
        $this->name = $name;
    }
    
    public function setOrigin($origin) {
        $this->origin = $origin;
    }
}

class StringInstrument extends Instrument {
    protected $stringCount;

    public function __construct($name, $origin, $stringCount) {
        parent::__construct($name, $origin);
        $this->stringCount = $stringCount;
    }

    public function play() {
        return parent::play() . " It has $this->stringCount strings.";
    }
    
    public function getStringCount() {
        return $this->stringCount;
    }
}

class WindInstrument extends Instrument {
    protected $keyCount;

    public function __construct($name, $origin, $keyCount) {
        parent::__construct($name, $origin);
        $this->keyCount = $keyCount;
    }

    public function play() {
        return parent::play() . " It has $this->keyCount keys.";
    }

    public function getKeyCount() {
        return $this->keyCount;
    }
}

echo "<h1>Challenge 2: Inheritance</h1>";

$guitar = new StringInstrument("Guitar", "Spain", 6);
echo $guitar->play() . "<br>";

$flute = new WindInstrument("Flute", "Various countries", 16);
echo $flute->play() . "<br>";
