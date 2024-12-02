<?php
    session_start();
    include_once("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "style.css">
    <title>Welcome to Vidya Jyothi Sports Event</title>
    <style>

        body{
            background-image: url("img2.jpg");
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
            
        }
        
    </style>

</head>

<body>

    <div class = "container">
        <h1>Welcome to Vidya Jyothi  Sports Event</h1>
        <p>Where learning is an intaractive evalutionary process</p>
        <div class="topnav">
            <div class="topnavleft">
                <a class="active" href="home.php">Home</a>
                <a href="contact.html">Contact</a>
                <a href="about.html">About</a>
            </div>

            <div class="topnavright">
                <a href="#">Welcome <?php echo $_SESSION['username']; ?></a>
                <!-- <a href="sign-up.php" id="sigh-up">Signup</a> -->
            </div>
        </div>
        
        <a href="about.html"><img src="img1.jpg" alt="Vidya Jyothi Sports" style="width: 100%;height: 350px;"></a>
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

        <table width='100'>
        <tr>
            <th>sports_id</th>
            <th>sports_name</th>
            <th>college_name</th>
            <th>sports_location</th>
            <th>sports_date</th>
            <th>1st_prize</th>
            <th>2nd_prize</th>
            <th>3rd_prize</th>
        </tr>
    <?php
        if($num > 0):
            while($result = $stmnt->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo $result['sports_id'];?></td>
                        <td><?php echo $result['sports_name'];?></td>
                        <td><?php echo $result['college_name'];?></td>
                        <td><?php echo $result['sports_location'];?></td>
                        <td><?php echo $result['sports_date'];?></td>
                        <td><?php echo $result['first_prize'];?></td>
                        <td><?php echo $result['second_prize'];?></td>
                        <td><?php echo $result['third_prize'];?></td>
                    </tr>
            <?php endwhile ?>
        <?php endif ?>
            
       
        </table>

        </div>
        
    </div>;

    
</body>
</html>