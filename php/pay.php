<?php


/**
 *  Name: Abhay Panchal
 *Student Number : 000813104
 *I Abhay Panchal Certify that this is my own Work!!
 *Purpose : This File use to get form for paying!
 */


include "connect.php";
$name = filter_input(INPUT_POST, "Fullname" , FILTER_SANITIZE_STRING);
$userID = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
$pin1 = filter_input(INPUT_POST, "pin1");
$ticket = filter_input(INPUT_POST, "ticket", FILTER_VALIDATE_INT);
$airline = filter_input(INPUT_POST, "airline" , FILTER_SANITIZE_STRING);

$error_msg = "";

$q = "INSERT INTO userticketdata (Userid , Flightnumber , Airline ) VALUES (?,?,?)";
$stml = $dbh -> prepare($q);
$param = [$userID , $ticket, $airline];
$success = $stml -> execute($param);

$q2 = "SELECT * FROM userticketdata Where $userID = ?";
$stmt2 = $dbh -> prepare($q2);
$param2 = [$userID];
$success2 = $stmt2 -> execute($param2);

$row2 = $stmt2 -> fetch();

$q3 = "SELECT * FROM airlines Where $ticket = ?";
$stmt3 = $dbh -> prepare($q3);
$param3 = [$ticket];
$success3 = $stmt3 -> execute($param3);

$row3 = $stmt3 -> fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="../html/js/script.js"></script>
    <title>Abhay's Airline Center</title>
    <style>
        .h{
            text-align: center;
            color: rgb(67, 67, 124);
            padding-top: 10px;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
        }

        .m{
            text-align: center;
            padding: 15px;
            border: 1px dotted black;
        }

        .payform{
            text-align: center;
            margin-top: 15px;
            padding: 25px;
            border: 1px dotted black;
        }

        #pin{
            margin-top: 11px;
        }

        #span{
            color: green;
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
                <li> <a href="#">About us</a></li>
                <li> <a href="../html/history.html">History</a></li>
                <li> <a href="../php/booking.php">Booking</a></li>
            </ul>
        </div>
    </header>
    <main class="m">
        <div class="h">
            <h1> This is Your Ticket!!</h1>

        </div>
        <?php
            while($row2){
                $num = "Ticket Number :  " . $row2["Ticketid"];
                $user = "User ID:   ". $row2["Userid"];
                echo $num . '<br>' . $user;
            break;
            }

            while($row3){
                $num2 = "<br>Departure:  " . $row3["Departure"] . '<br>'.
                "Arrival:  " . $row3["Arrival"] . '<br>'.
                "Airline:  " . $row3["Airline"] . '<br>'.
                "Cost:  $" . $row3["Cost"];

                echo $num2;
            break;
            }
        
        ?>
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