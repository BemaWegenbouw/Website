<?php

//Start DB connection
$pdo = new PDO("mysql:host=$config['db_host'];dbname=$config['db_name'];port=$config['db_port']', '$config['db_user']", "$config['db_pass']");

?>