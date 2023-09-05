<?php

class Bird {
  
  var $commonName;
  var $food = "bugs";
  var $nestPlacement = "tree";
  var $conservationLevel;

  function song($song) {
    return $song;
  }

  function canFly($canFly){
    if($canFly){
      return "This Bird Can Fly";
    } else {
      return "This Bird Can\'t Fly";
    }
  }

}

$bird1 = new Bird;
$bird1->commonName = "Eastern Towhee";
$bird1->food = "seeds, fruits, insects, spiders";
$bird1->nestPlacement = "Ground";
$bird1->conservationLevel = "Low";

echo "<table><th>".$bird1->commonName."</th>";
echo "<tr><td>Food:</td><td>".$bird1->food."</td></tr>";
echo "<tr><td>Nest Placement:</td><td>".$bird1->nestPlacement."</td></tr>";
echo "<tr><td>Conservation Level:</td><td>".$bird1->conservationLevel."</td></tr>";
echo "<tr><td>Song:</td><td>".$bird1->song("drink-your-tea!")."</td></tr>";
echo "<tr><td>Can Fly:</td><td>".$bird1->canFly(true)."</td></tr>";

$bird2 = new Bird;
$bird2->commonName = "Indigo Bunting";
$bird2->food = "small seeds, berries, buds, and insects";
$bird2->nestPlacement = "roadsides, and railroad rights-of-wafields and on the edges";
$bird2->conservationLevel = "Low";

echo "<table><th>".$bird2->commonName."</th>";
echo "<tr><td>Food:</td><td>".$bird2->food."</td></tr>";
echo "<tr><td>Nest Placement:</td><td>".$bird2->nestPlacement."</td></tr>";
echo "<tr><td>Conservation Level:</td><td>".$bird2->conservationLevel."</td></tr>";
echo "<tr><td>Song:</td><td>".$bird2->song("whatwhat!!")."</td></tr>";
echo "<tr><td>Can Fly:</td><td>".$bird2->canFly(true)."</td></tr>";

?>
