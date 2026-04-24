<?php

class Database {

    static protected $database;
    static protected $table_name = "";
    static protected $db_columns = [];

    static public function set_database($database) {
        self::$database = $database;
    }

    static public function find_by_sql($sql) {
        //echo $sql;
        $results = self::$database->query($sql);
        if (!$results) {                        //add valuation of the query succeded or failed
            exit("Database query failed. ");
        }
        $object_array = [];
        while ($record = $results->fetch_assoc()) { //get the first row as an array and create an object
            $object_array[] = static::instantiate($record);
        }
        return $object_array;
    }

    static public function find_all() {
        $sql = "SELECT * FROM " . static::$table_name; // static:: is used for late static binding so subclasses resolve their own $table_name at runtime
        return static::find_by_sql($sql);
    }

    static public function find_by_id($id) {
        $sql = "SELECT * FROM " . static::$table_name . " WHERE id='" . static::$database->escape_string($id) . "'"; //escape the string
        $result = static::find_by_sql($sql);
        if (!empty($result)) {
            return array_shift($result); //return the first element
        } else {
            return null;
        }
    }

    static protected function instantiate($record) {
        $object = new static;
        foreach ($record as $property => $value) {
            if (property_exists($object, $property)) {
                $object->$property = $value;
            }
        }
        return $object;
    }

    // $attributes are the properties that have the database columns excluding 'id'
    public function attributes() {
        $attributes = [];
        foreach (static::$db_columns as $column) {
            if ($column == 'id') { continue; }
            $attributes[$column] = $this->$column;
        }
        return $attributes;
    }

    // updates object properties with new values from the form
    public function merge_attributes($args = []) {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

}

?>