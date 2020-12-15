<?php
/**
 *  Name: Abhay Panchal
 *Student Number : 000813104
 *I Abhay Panchal Certify that this is my own Work!!
 *Purpose : This File use to get form for booking after login!
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
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

        .topnav ul li{
            padding: 10px;
        }

        #showticket{
            text-align: center;
            padding: 30px;
            border: 1px dotted black;
            display: none;
        }
        .footer{
            text-align: center;
        }
    </style>
</head>
<body>
    <header class="header" id="header">
        <div class="topnav">
            <ul>
                <li><label>User:</label>
            </ul>
            <ul>
                <li><a href="../html/cancel.html" title="subscribe"> Cancel Ticket </a></li>
                <li><a href="../index.html" title="subscribe">Logout</a></li>
            </ul>
        </div>
        <div class="logo">
            <img src="../img/header.png" alt="logo">
        </div>
        <div class="navigation">
            <ul> 
                <li> <a href="#about">About us</a></li>
                <li> <a href="../html/history.html">History</a></li>
            </ul>
        </div>
    </header>
    <main>
        <div class="h">
            <h1> Flights Booking</h1>

        </div>

        <div>
            <form class="bookform2" method="POST" action = "../php/searchticket.php">
                From: <select class="from" name="from" id="from" >
                    <option value="Toronto"> Toronto </option>
                    <option value="Hamilton"> Hamilton </option>
                    <option value="PEI"> PEI </option>
                    <option value="Calgary"> Calgary </option>
                </select>
                To: <select class="to" name="to" id="to">
                    <option value="Toronto"> Toronto </option>
                    <option value="Hamilton"> Hamilton </option>
                    <option value="PEI"> PEI </option>
                    <option value="Calgary"> Calgary </option>
                </select>
                Date: <input type="date" name="date" id="date" >
                Members: <select class="member" name="member" id="member">
                    <option value="1"> 1 </option>
                    <option value="2"> 2 </option>
                    <option value="3"> 3 </option>
                    <option value="4"> 4 </option>
                </select>
                Class: <select class="class" id="class" name="class">
                    <option value="economy">Economy</option>
                    <option value="business">Business</option>
                </select><br>

                <button type="button" name="submit" id="submit1">Search Flights</button>
             </form>
             <div id="showticket">

             </div>
             <div id="note">

             </div>
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

<script>
    $(document).ready(function(){
        $('#submit1').click(function(){
            $('#showticket').css('display', 'block');
            //$('#note').add("<p style='Color: Red;'> You will need Flight number later so note it down!! Thank you!");
            let from = $('#from').val();
            let to = $('#to').val();
            let date = $('#date').val();
            let member = $('#member').val();
            let claass = $('#class').val();

            $.ajax({
                url: "../php/searchticket.php",
                method: "POST",
                data: {from:from , to:to , date:date , member:member , claass:claass},
                dataType: "JSON",
                success:function(datas){
                    $.each(datas, function(i , data){
                        $('#showticket').append('Flight Number:'+ data.TicketNumber+ ' ' +'Airline: ' +'<b>' +data.Airline +'</b>'+ ' Departure: '+'<b>'+data.Departure +"</b>"+ " Arrival: " + '<b>'+data.Arrival +"</b>"+ " Cost: " +'<b>$'+ data.Cost +"</b>"+ "  "+ "<button><a href='../php/payment.php'>book ticket</a></button><br><br> ");
                    });

                }
                });
            
        });
    });
</script>