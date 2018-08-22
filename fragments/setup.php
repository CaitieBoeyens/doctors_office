<?php
// Setup.php
    require_once __DIR__.'/../classes/DatabaseHandler.php';
    $db = new DatabaseHandler('mysql','localhost:3306','doctors_office','root','1234');
    $self = htmlspecialchars($_SERVER['PHP_SELF']);
    $formSubmitted = $_SERVER['REQUEST_METHOD'] === 'POST';
?>