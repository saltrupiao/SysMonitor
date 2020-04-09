<?php

$dsn = 'mysql:host=localhost;dbname=sysmonitor';
$username = 'root';
$password = 'GuoJ1RaadXHf';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    exit;
}
?>