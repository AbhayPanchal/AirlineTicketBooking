<?php

/**
 *  Name: Abhay Panchal
 *Student Number : 000813104
 *I Abhay Panchal Certify that this is my own Work!!
 *Purpose : This File use to get form for register for the user!
 */


include "connect.php";

$Fullname = filter_input(INPUT_POST, "Fullname" , FILTER_SANITIZE_STRING);
$Email = filter_input(INPUT_POST, "Remail" , FILTER_SANITIZE_EMAIL);
$Phonenumber = filter_input(INPUT_POST, "Rphonenumber");
$Gender = filter_input(INPUT_POST, "Rgender" , FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "RPassword");
$password2 = filter_input(INPUT_POST, "RCPassword");
$msg="";

$hashed_password = md5($password);


$q = "SELECT Email FROM user_information Where Email = ?";
$stmt = $dbh -> prepare($q);
$param = [$Email];
$success = $stmt -> execute($param);

$count = $stmt -> rowCount();

if($password === $password2 and $count == 0){

$Rcommand = "INSERT INTO  user_information (Fullname, Phonenumber, Email, Gender, Passwords) VALUES(?,?,?,?,?)";
$R_stmt = $dbh -> prepare($Rcommand);
$R_param = ["$Fullname", "$Phonenumber" , "$Email" , "$Gender" , "$hashed_password"];
$R_success = $R_stmt -> execute($R_param);

header("Location: ../php/login.php");
}else{
    $msg = "Password Doesn't match or Email already exist try again!!";
}

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
        .register{
            padding-top: 20px;
            display: grid;
            grid-template-columns: 2fr 1.6fr 2fr;
        }
        .registerform{
            border: 2px solid black;
            border-radius: 2px;
            padding: 10px;
            grid-column: 2;
        }

        .registerform input{
            margin-left: 5px;
        }
        .Fullname{
            margin-left: 27px;
        }

        .Rbtn{
            margin-left: 125px;
            border: 1px solid black;
            border-radius: 4px;
            margin-top: 20px;
            
        }
        .l{
            margin-left: 5px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <header class="header" id="header">
        <div class="topnav">
            <ul>
                <li><a href="../php/login.php" title="subscribe"> Cancel Ticket </a></li>
                
            </ul>
        </div>
        <div class="logo">
            <img src="../img/header.png" alt="logo">
        </div>
        <div class="navigation">
            <ul> 
                <li> <a href="#">About us</a></li>
            </ul>
        </div>
    </header>
    <main class="register" id="register">
        <form method="POST" class="registerform" action="../php/register.php">
            <div>
                <label>Fullname</label>
                <span style="margin-left: 100px;"><input type="text" name="Fullname" class="Fullname" required></span>
            </div>
            <div>
                <label>Email</label>
                <span style="margin-left: 125px;"><input type="email" name="Remail" class="Remail" required></span>
            </div>
            <div>
                <label>Phonenumber</label>
                <span style="margin-left: 62px;"><input type="number" name="Rphonenumber" class="Rphonenumber" required></span>
            </div>
            <div>
                <label>Gender</label>
                <span style="margin-left: 109px;"><input type="Text" name="Rgender" class="Rgender" required></span>
            </div>
            <div>
                <label>Password</label>
                <span style="margin-left: 95px;"><input type="password" name="RPassword" class="RPassword" required></span>
            </div>
            <div>
                <label>Confirm Password</label>
                <span style="margin-left: 35px;"><input type="password" name="RCPassword" class="RCPassword" required></span>
            </div>
            
            <div>
                <span style="margin-left: 50px;"><button type="submit" name="Rlogin" class="Rbtn">Login</button></span>
            </div>
            <div class="l">
                <p>Already a member? <a href="../php/login.php">Login</a></p>
            </div>   
            <div>
                <span id="msg">
                    <?php
                        echo $msg;
                    ?>
                </span>
            </div>         
    </main>
    <footer class="footer" id="footer">
        <div class="logo" id="logo">
            <img src="../img/header.png" alt="logo">
        </div>
    </footer>

</body>
</html>