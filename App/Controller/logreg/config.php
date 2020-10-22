<?php
define('USER', 'root');
define('PASSWORD', '');
define('HOST', 'localhost');
define('DATABASE', 'choc');
 
try {
    $connection = new mysqli(HOST, USER, PASSWORD, DATABASE);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>