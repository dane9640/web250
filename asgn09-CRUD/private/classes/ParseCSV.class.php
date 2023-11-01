<?php

  class ParseCSV {
      
      // Delimiter for CSV files
      public static $delimiter = ',';
    
      // Filename of CSV file
      private $filename;

      // Header of CSV file
      private $header;

      // Data of CSV file that is parsed
      private $data = [];

      // Parse header of CSV file
      private $parse_header = true;

      // Row count of CSV file
      private $rowCount = 0;

      // Constructor
      public function __construct($filename) {
        if($this->fileExists($filename)){
          $this->filename = $filename;
        }
      }
  
      //Parses the CSV file and returns data
      //in a multi-dimensional array that can be looped through
      public function parse() {
        if(!isset($this->filename)) { 
          echo "File not set.";
          return false;
         }

        $this->reset();
        $file = fopen($this->filename, 'r');
        while(!feof($file)) {
          $row = fgetcsv($file, 0, self::$delimiter);
          if($row == [null] || $row === false) { continue; }
          if($this->parse_header) {
            $this->header = $row;
            $this->parse_header = false;
          } else {
            $this->data[] = array_combine($this->header, $row);
            $this->rowCount++;
          }
        }
        fclose($file);
        return $this->data;
      }  

      //Checks if file exists and is readable
      public function fileExists($filename){
        if (!file_exists($filename)) {
          echo "File not found: " . $filename;
          return false;
        } else if (!is_readable($filename)) {
          echo "File is not readable: " . $filename;
          return false;
        } else {
          return true;
        }
      }

      //returns the data that was last parsed.
      public function lastResults(){
        return $this->data;
      }

      //returns the amount of rows that were parsed.
      public function rowCount() {
        return $this->rowCount;
      }

      //resets the data allowing the parser to be used again.
      private function reset(){
        $this->header = null;
        $this->data = [];
        $this->rowCount = 0;
      }
  }

?>