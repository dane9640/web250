<?php

function dbConnect() {
  $connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  confirmDbConnect($connection);
  return $connection;
}

function confirmDBConnect($connection) {
  if($connection->connect_errno) { 
    $msg = "Database connection failed: ";
    $msg .= $connection->connect_error;
    $msg .= " (" . $connection->connect_errno . ")";
    exit($msg);
  }
}

function dbDisconnect() {
  if(isset($connection)) {
    $connection->close();
  }
}


?>
