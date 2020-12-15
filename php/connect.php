<?php
/**
 * Name:  Abhay Panchal 
 * Student Number : 000813104
 * Date : 2020-12-04
 */

 //Connect the php file with the shopping database with PDO
try {
    $dbh = new PDO(
        "mysql:host=localhost;dbname=airlineticket",
        "root",
        ""
    );
} catch (Exception $e) {
    die("ERROR: Couldn't connect. {$e->getMessage()}");
}
?>