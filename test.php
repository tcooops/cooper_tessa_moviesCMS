<?php
include_once 'config/database.php';

$start = microtime(true);
// repeat 1000 times db connections in PHP
$i = 0;
while($i <1000) {
    $database = Database::getInstance();
    $db = $database->getConnection();
    $i ++;
}

$new_time_cal = microtime(true) - $start;

printf('DB NEW Connection Cal ==> %s ms'.PHP_EOL, $new_time_cal*1000);

