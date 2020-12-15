
<?php
/**
 *  Name: Abhay Panchal
 *Student Number : 000813104
 *I Abhay Panchal Certify that this is my own Work!!
 *Purpose : This File use to get form for paying!
 */

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
            </ul>
        </div>
    </header>
    <main>
        <div class="h">
            <h1> Payment</h1>

        </div>

        <div>
            <form method="POST" class="payform" id="payform" action="../php/pay.php">
                <div>
                    <label>Fullname</label>
                    <span style="margin-left: 10px;"><input type="text" name="Fullname" class="Fullname" required></span>
                </div>
                <div>
                    <label>Userid</label>
                    <span style="margin-left: 10px;"><input type="number" name="id" class="Fullname" required></span>
                </div>
                
                <div>
                    <span><label style="margin-right: 50px;">Flightnumber</label></span>
                    <span><input type="text" name="ticket" class=""  required></span>
                </div>
                <div>
                    <span><label style="margin-right: 50px;">Airline Name</label></span>
                    <span><input type="text" name="airline" class=""  required></span>
                </div>
                <div>
                    <label>Card Number</label>
                    <span ><input type="number" name="cardnum" class="cardnum" required></span>
                </div>
                <div>
                    <span><label> PIN</label></span>
                    <span><input type="password" name="pin2" class="pin"  required></span>
                </div>
                
                <input type="submit" name="pay" id="pay" value="Pay Now!" ><br>
                <a style="color:red;" href="../html/findID.html">Don't know your userID! Don't worry Click here!! </a>

                <span id = "span"> </span>
             </form>
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