<?php


/**
 *  Name: Abhay Panchal
 *Student Number : 000813104
 *I Abhay Panchal Certify that this is my own Work!!
 *Purpose : This is use see the history of the user!
 */


include "connect.php";

$id = filter_input(INPUT_POST, "id" , FILTER_VALIDATE_INT);
$msg = "";

$q1 = "SELECT * FROM userticketdata WHERE Userid = $id";
$stmt1 = $dbh -> prepare($q1);
$param1 = [$id];
$success1 = $stmt1 -> execute($param1);

$count1 = $stmt1 -> rowCount();

$row1 = $stmt1 -> fetch();

$q2 = "SELECT * FROM cencellog WHERE Userid = $id";
$stmt2 = $dbh -> prepare($q2);
$param2 = [$id];
$success2 = $stmt2 -> execute($param2);

$count2 = $stmt2 -> rowCount();
$row2 = $stmt2 ->fetch();
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
            <ul><li><a href="../html/findID.html">Find Your ID</a> <span id="name"></span></li></ul>
        </div>
        <div class="logo">
            <img src="../img/header.png" alt="logo">
        </div>
        <div class="navigation">
            <ul> 
                <li> <a href="#about">About us</a></li>
                <li> <a href="../php/booking.php">Go back to Booking</a></li>
                
            </ul>
        </div>
    </header>
    <main>
        <div class="h">
            <h1>Your History!</h1>

        </div>
        <div class="bookform2">
            <?php
                if($count1 == 0){
                    $msg = "You Don't have any ticket Booked!!";
                    echo "$msg";
                }else{
                    echo "<p> You have total '$count1' tickets booked!!</p>";
                }

                if($count2 == 0){
                    $msg = "You haven't cancel any tickets yet! Thank you!";
                    echo "$msg";


                }else{
                    echo "<p> You Canceled total '$count2' tickets!!</p>";
                }
            ?>
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