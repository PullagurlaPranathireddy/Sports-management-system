<?php
    include_once("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "style.css">
    
    <title>Welcome To Jbeit Sports Event</title>
    <style>

        body{
            background-image: url("img_b.jpg");
            opacity: 1;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }


        .topnav{
            background-color: burlywood;
        }

        .topnavleft a{
            float: left;
            color:cornsilk;
            text-align:center;
            padding:14px;
            font-size:20px;
        }

        .topnavright a{
            float:right;
            color:cornsilk;
            text-align:center;
            padding:14px;
            font-size:20px;
        }

        .topnav a:hover{
            background-color: rgb(0, 128, 0);
            color: rgb(230, 141, 207);
        }

        .topnav a.active{
            background-color: rgb(182, 182, 12);
            color: rgba(255, 255, 255, 0.315);
        }

        table, th, td{
            border: 1px solid black;
            width: 100%;
            padding: 15px;
            text-align: left;
            background-color: #7aafece8;
            padding: 20px; 
        }
        
    </style>

</head>

<body>

    <div class = "container">
        <h1>Welcome To Jbeit Sports Event</h1>
        <p>Where learning is an intaractive evalutionary process</p>
        <div class="topnav">
            <div class="topnavleft">
                <a class="active" href="index.php">Home</a>
                <a href="contact.html">Contact</a>
                <a href="about.html">About</a>
            </div>

            <div class="topnavright">
                <a href="select-login.php">Login</a>
                <a href="sign-up.php" id="sigh-up">Signup</a>
            </div>
        </div>
        
        <img src="img.jpg" alt="Jbeit Sports" style="width: 100%;height: 350px;"></a>
        <h3>Sports that you can take participation are:- </h3><br>
        <h4>Outdoor</h4>
        <ul>
            <li>Cricket</li>
            <li>Football</li>
            <li>Badminton</li>
            <li>Basketball</li>
        </ul>

        <h4>Indoor</h4>
        <ul>
            <li>Chess</li>
            <li>Pool</li>
            <li>Table Tennis</li>
            <li>Carram</li>
        </ul>
        <div style = "position:relative; top:40px; right:0%;">
        </div>
        </div>
        
   

    
</body>
</html>