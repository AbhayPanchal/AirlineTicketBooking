<?php

/**
 *  Name: Abhay Panchal
 *Student Number : 000813104
 *I Abhay Panchal Certify that this is my own Work!!
 *Purpose : This File use to get form for logining for the user!
 */

include "connect.php";

session_start();

$email = filter_input(INPUT_POST , "Username" , FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST , "Password");

$hashed_password = md5($password);

$msg = "";

if($email !== null and $password !== null){
    $command = "SELECT * FROM `user_information` WHERE Email =? and Passwords = ?";

    $stmt = $dbh -> prepare($command);
    $param = [$email , $hashed_password ];
    $success = $stmt -> execute($param);

    $row = $stmt -> fetch();

    while($row){
        $id = $row["Userid"];
    break;
    }

    $c = $stmt -> rowCount();
    
    if($c == 1){
        header("Location: ../php/booking.php");
    }else{
        $msg = "<b>Invalid User name or password</b>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <title>Abhay's Airline Center</title>
    <style>
        .login{
            padding-top: 20px;
            display: grid;
            grid-template-columns: 3fr 1.8fr 3fr;
        }
        .loginform{
            border: 2px solid black;
            padding: 10px;
            grid-column: 2;
        }
        .Username{
            margin-left: 27px;
        }

        .btn{
            margin-left: 100px;
            border: 1px solid black;

        }

        .R{
            margin-left: 5px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <header class="header" id="header">
        <div class="topnav">
            <ul>
                <li><a href="#" title="subscribe"> Cancel Ticket </a></li>
            </ul>
        </div>
        <div class="logo">
            <img src="../img/header.png" alt="logo">
        </div>
        <div class="navigation">
            <ul> 
                <li> <a href="#">About us</a></li>
                <li> <a href="../php/history.php">History</a></li>
            </ul>
        </div>
    </header>
    <main class="login" id="login">
        <form method="POST" class="loginform">
            <div>
                <label>Email</label>
                <input type="text" name="Username" class="Username" required>
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="Password" class="Password" required>
            </div>
            <div>
                <input type="submit" name="login" id="button" class="btn" value="Login">
            </div>
           
            <div class="R">
                <p>Not a member? <a href="../html/register.html">Register</a></p>
            </div> 
            <span id="error"> <?php echo "$msg"?></span>
    </main>
    <footer class="footer" id="footer">
        <div class="logo" id="logo">
            <img src="../img/header.png" alt="logo">
        </div>
    </footer>
    
</body>

</html>