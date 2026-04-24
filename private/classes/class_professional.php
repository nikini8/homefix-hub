<?php

require_once('class_database.php');

class Professional extends Database {

    static public $table_name = "certified_professionals";
    static protected $db_columns = [
        'id', 'fullName', 'emailAddress', 'serviceCoverageArea',
        'certificationsandLicenses', 'yearsOfExperience', 'areaofSpecialization'
    ];

    // properties matching the table columns
    public $id;
    public $fullName;
    public $emailAddress;
    public $serviceCoverageArea;
    public $certificationsandLicenses;
    public $yearsOfExperience;
    public $areaofSpecialization;

    // instance method - not static - inserts a new professional into the database
    public function create() {
        $attributes = $this->attributes();
        $sql  = "INSERT INTO " . static::$table_name . " (";
        $sql .= join(', ', array_keys($attributes));
        $sql .= ") VALUES ('";
        $sql .= join("', '", array_values($attributes));
        $sql .= "')";
        $results = static::$database->query($sql);
        if ($results) {
            $this->id = static::$database->insert_id; //get the new id
        }
        return $results;
    }

    // instance method - updates an existing professional
    public function update() {
        $attributes = $this->attributes();
        $attribute_pairs = [];
        foreach ($attributes as $key => $value) {
            $attribute_pairs[] = "{$key}='{$value}'";
        }
        $sql  = "UPDATE " . static::$table_name . " SET ";
        $sql .= join(', ', $attribute_pairs);
        $sql .= " WHERE id='" . static::$database->escape_string($this->id) . "'";
        $results = static::$database->query($sql);
        return $results;
    }

    // instance method - deletes a professional
    public function delete() {
        $sql = "DELETE FROM " . static::$table_name . " WHERE id='" . $this->id . "' LIMIT 1";
        $results = static::$database->query($sql);
        return $results;
    }

}

?>