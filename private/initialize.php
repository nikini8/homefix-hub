<?php

require_once('credentials.php');
require_once('database_functions.php');
require_once('classes/class_database.php');
require_once('classes/class_service.php');
require_once('classes/class_professional.php');

$database = db_connect(); // call the connection

Service::set_database($database);       // class 'becomes aware' about the database
Professional::set_database($database);  // class 'becomes aware' about the database

?>
