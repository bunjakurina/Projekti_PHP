<?php

define("HOST", "127.0.0.1:3333");
define("DBNAM", "php");
define("USERNAME", "root");
define("PASSWORD", "mmiilan12");

?>


<?php
//
define('DB_SERVER', '127.0.0.1:3333');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'mmiilan12');
define('DB_NAME', 'php');

/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
?>
    
    
    
    
    
