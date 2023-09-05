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

?>
