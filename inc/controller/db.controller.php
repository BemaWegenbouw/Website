<?php

//Start DB connection
$pdo = new PDO('mysql:host=' . $config['db_host'] . ';dbname=' . $config['db_name'], $config['db_user'], $config['db_pass']);

//Open Database Class
class database {



}

$db = new database;

?>