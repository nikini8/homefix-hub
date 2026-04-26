<?php
function db_connect() {
    $database = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME, DB_PORT);
    confirm_db_connect($database);
    return $database;
}

function confirm_db_connect($database) {
    if ($database->connect_errno == 0) {
        // echo "Connection to DB succeed. <br>";  
    }
    if ($database->connect_errno > 0) {
        $msg  = "Database connection failed: ";
        $msg .= $database->connect_error;
        $msg .= " (" . $database->connect_errno . ")";
        echo $msg;
        echo "<br>";
    }
}
?>