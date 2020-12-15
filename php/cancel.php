<?php

/**
 *  Name: Abhay Panchal
 *Student Number : 000813104
 *I Abhay Panchal Certify that this is my own Work!!
 *Purpose : This file use to cancel the ticket.
 */

include "connect.php";

$name = filter_input(INPUT_POST, "Fullname" , FILTER_SANITIZE_STRING);
$userID = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
$email = filter_input(INPUT_POST, "Remail", FILTER_SANITIZE_STRING);
$reason = filter_input(INPUT_POST, "reason");

$q = "INSERT INTO cencellog (Userid , Email , Reason) VALUES (?,?,?)";

$stmt = $dbh-> prepare($q);

$param = [$userID, $email , $reason];

$success = $stmt -> execute($param);


$q2 = "DELETE FROM userticketdata WHERE Userid = ?";

$stmt2 = $dbh-> prepare($q2);

$param2 = [$userID];

$success2 = $stmt2 -> execute($param2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="js/script.js"></script>
    <title>Abhay's Airline Center</title>
    <style>
        .h{
            text-align: center;
            color: rgb(67, 67, 124);
            padding-top: 10px;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
        }

        .bookform2{
            text-align: center;
            margin-top: 15px;
            padding: 15px;
        }

        #submit{
            margin-top: 11px;
        }

        .footer{
            text-align: center;
        }
    </style>
</head>
<body>
    <header class="header" id="header">
        <div class="topnav">
            <ul><li>User : <span id="name"></span></li></ul>
        </div>
        <div class="logo">
            <img src="../img/header.png" alt="logo">
        </div>
        <div class="navigation">
            <ul> 
                <li> <a href="#about">About us</a></li>
                <li> <a href="../php/history.html">History</a></li>
                <li> <a href="../php/booking.php">Go back to Booking</a></li>
            </ul>
        </div>
    </header>
    <main>
        <div class="h">
            <h1> Cancel Ticket</h1>

        </div>
        <div class="bookform2" style="color: green;">
            "Your Ticket is Canceled!!"
        </div>

        
    </main>

    <footer class="footer" id="footer">
        <div class="logo" id="logo">
            <img src="../img/header.png" alt="logo">
        </div>
        <div id="about">
            <p>
                We are here to help you find best airline to travel!! Login to start!!
            </p>
        </div>
    </footer>
</body>
</html>