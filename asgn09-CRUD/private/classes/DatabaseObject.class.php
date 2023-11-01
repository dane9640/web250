<?php

class DatabaseObject {

  static protected $database;
  static protected $tableName = "";
  static protected $dbColumns = [];
  public $errors = [];

  static public function setDatabase($database) {
    self::$database = $database;
  }

  static public function findBySQL($sql) {
    $result = self::$database->query($sql);

    if(!$result) {
      exit("Database query failed.");
    }

    $objectArray = [];
    while($record = $result->fetch_assoc()){
      $objectArray[] = self::instantiate($record);
    }

    $result->free();

    return $objectArray;
  }

  static public function findAll() {
    $sql = "SELECT * FROM " . static::$tableName . "";
    $result = static::findBySQL($sql);
    return $result;
  }

  static public function findByID($id) {
    $sql = "SELECT * FROM " . static::$tableName . " ";
    $sql .= "WHERE id='" . static::$database->escape_string($id) . "'";

    $objectArray = static::findBySQL($sql);
    if (!empty($objectArray)) {
      return array_shift($objectArray);
    } else {
      return false;
    }
  }

  static protected function instantiate($record) {
    $object = new static;

    foreach($record as $property => $value) {
      if(property_exists($object, $property)) {
        $object->$property = $value;
      }
    }

    return $object;
  }
  
  protected function validate() {
    $this->errors = [];
    return $this->errors;
  }

  protected function create() {
    $this->validate();
    if(!empty($this->errors)) { return false; }

    $attributes =   $this->sanitizedAttributes();
    $sql = "INSERT INTO " . static::$tableName . " (";
    $sql .= join(', ' , array_keys($attributes));
    $sql .= ") VALUES ('";
    $sql .= join("', '", array_values($attributes));
    $sql .= "')";
    $result = self::$database->query($sql);
    if ($result) {
      $this->id = self::$database->insert_id;
    }
    return $result;
  }

  protected function update() {
    $this->validate();
    if(!empty($this->errors)) {return false;}

    $attributes = $this->sanitizedAttributes();
    $attributePairs = [];
    foreach($attributes as $key => $value) {
      $attributePairs[] = "{$key}='{$value}'";
    }
    $sql = "UPDATE " . static::$tableName . " SET ";
    $sql .= join(', ', $attributePairs);
    $sql .= " WHERE id='" . self::$database->escape_string($this->id) . "' ";
    $sql .= "LIMIT 1";
    echo $sql;
    $result = self::$database->query($sql);
    return $result;
  }

  public function save() {
    //a new record will not have an id yet
    if(isset($this->id)) {
      return $this->update();
    } else {
      return $this->create();
    }
  }

  public function delete() {
    $sql = "DELETE FROM " . static::$tableName . " ";
    $sql .= "WHERE id='" . self::$database->escape_string($this->id) . "' ";
    $result = self::$database->query($sql);
    return $result;
  }

  public function mergeAttributes($args=[]) {
    foreach($args as $key => $value) {
      if(property_exists($this, $key) && !is_null($value)) {
        $this->$key = $value;
      }
    }
  }

  public function attributes() {
    $attributes = [];
    foreach(static::$dbColumns as $column) {
      if($column == 'id') { continue; }
      $attributes[$column] = $this->$column;
    }
    return $attributes;
  }

  protected function sanitizedAttributes() {
    $sanitized = [];
    foreach($this->attributes() as $key => $value) {
      $sanitized[$key] = self::$database->escape_string($value);
    }
    return $sanitized;
  }

}
?>
