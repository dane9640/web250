<?php

function my_autoloader($class) {
  if(preg_match('/\A\w+\Z/', $class)) {
    include 'classes/' . $class . '.class.php';
  }
}

spl_autoload_register('my_autoloader');

$flyCatcher = new Bird(['commonName' =>'Acadian Flycatcher', 'latinName' => 'Empidonax Virescens']);

$flyCatcher->displayInfo();

?>

<a href="../index.html">Back to WEB-225</a>
