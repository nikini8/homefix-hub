<?php

require_once('class_database.php');

class Service extends Database {

    static public $table_name = "services_offered";
    static protected $db_columns = [
        'id', 'name', 'briefDescription', 'benefits', 'price'
    ];

    // properties matching the table columns
    public $id;
    public $name;
    public $briefDescription;
    public $benefits;
    public $price;

}

?>