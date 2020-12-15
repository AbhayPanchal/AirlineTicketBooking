<?php

/**
 *  Name: Abhay Panchal
 *Student Number : 000813104
 *I Abhay Panchal Certify that this is my own Work!!
 *Purpose : This file has a queries to search the tickets! with JSON!!
 */

include "connect.php";
$departure = filter_input(INPUT_POST , "from" , FILTER_SANITIZE_STRING);
$arrival = filter_input(INPUT_POST , "to" , FILTER_SANITIZE_STRING);


$command = "SELECT * FROM `airlines` WHERE Departure = \"$departure\" and Arrival = \"$arrival\"";

$stmt = $dbh -> prepare($command);

$success = $stmt -> execute();

$array = [];

if($success){
    while($row = $stmt -> fetch()){
        $ticketDetail = [
            "TicketNumber" => $row["Flightnumber"],
            "Departure" => $row["Departure"],
            "Arrival" => $row["Arrival"],
            "Airline" => $row["Airline"],
            "Cost" => $row["Cost"]
        ];

        array_push($array, $ticketDetail);
    }

    echo json_encode($array);
}

?>