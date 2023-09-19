<?php

class Bird {
    public static $instance_count;
    public static $egg_num = 0;
    
    public $habitat;
    public $food;
    public $nesting = "tree";
    public $conservation;
    public $song = "chirp";
    public $flying = "yes";

    public function can_fly() {
        return $this->flying = "yes" ? "can fly" : "is stuck on the ground";
    }

    public static function create() {
        $class_name = get_called_class();
        $obj = new $class_name;
        static::$instance_count++;
        return $obj;
    }
}

class YellowBelliedFlyCatcher extends Bird {
    public static $egg_num = "3-4, sometimes 5.";
    var $name = "yellow-bellied flycatcher";
    var $diet = "mostly insects.";
    var $song = "flat chilk";
}

class Kiwi extends Bird {
    var $name = "kiwi";
    var $diet = "omnivorous";
    var $flying = "no";
}
