function db_connect() {
    $database = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME, DB_PORT);
    confirm_db_connect($database);
    return $database;
}