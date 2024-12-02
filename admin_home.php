<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "style.css">
    
    
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

            .dropdown {
                float: left;
                overflow: hidden;
                }

                .dropdown .dropbtn {
                font-size: 16px;  
                border: none;
                outline: none;
                color: white;
                padding: 14px 16px;
                background-color: inherit;
                font-family: inherit;
                margin: 0;
                }

                .topnav a:hover, .dropdown:hover .dropbtn {
                background-color: rgb(0, 128, 0)
                }

                .dropdown-content {
                display: none;
                position: absolute;
                background-color: #f9f9f9;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
                }

                .dropdown-content a {
                float: none;
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
                text-align: left;
                }

                .dropdown-content a:hover {
                background-color: #ddd;
                }

                .dropdown:hover .dropdown-content {
                display: block;
                }

            table, th, td{
                
                width: 100%;
                padding: 15px;
                text-align: left;
                background-color: #7aafece8;
                padding: 20px;
            }
            
            table, th, td {
                border: 2px solid black;
            }

           

            .container h2{
                text-align:center;
            }

                        
            

    </style>
</head>
<body>
<div class="container">

<h1>Welcome to Jbiet Sports Event</h1>
        <p>Where learning is an intaractive evalutionary process</p>
        <div class="topnav">
            <div class="topnavleft">
                <a class="active" href="admin_home.php">Home</a>
                <a href="contact.html">Contact</a>
                <a href="about.html">About</a>
            </div>

            
            
                
                <!-- <a href="sign-up.php" id="sigh-up">Signup</a> -->
                <div class="topnavright" style="float: right;";>
                    <a href="logout.php" style="position:absolute; top:105px; right:250px;">Logout</a>
                    <div class="dropdown">



   
 




                        <button class="dropbtn"><a href="#">Welcome <?php echo $_SESSION['username']; ?></a>
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                            <a href="admin_parti_show.php">Participants</a>
                            <a href="admin_show_sports.php">Sports</a>
                            <a href="admin_show.php">Students</a>
                        </div>
                    </div>
                    
                </div>
                
            
        </div>


        <?php
        if (isset($_SESSION['username'])) {
            
        } else {
            echo 'Welcome Guest';
        }
        ?>

        <img src="img.jpg" alt="Jbiet Sports" style="width: 100%;height: 350px;"></a>

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

 
    
        
       
        </table>
</div>
</body>
</html>
    




<?php
// session_start();
include_once("conn.php");

try {
    $query = "SELECT * FROM sports_events";
    $stmt = $conn->prepare($query);
    $stmt->execute(); // Execute the prepared statement
    $count = $stmt->rowCount();
} catch (PDOException $e) {
    error_log('Database Error: ' . $e->getMessage()); // Log the error
    echo 'An error occurred while processing your request. Please try again later.';
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags and stylesheets go here -->
</head>

<body>
    <div class="container">
        <!-- Your HTML content goes here -->

        <table width='100'>
            <tr>
                <th>sports_name</th>
                <th>college_name</th>
                <th>sports_location</th>
                <th>sports_date</th>
                <th>1st_prize</th>
                <th>2nd_prize</th>
                <th>3rd_prize</th>
            </tr>
            <?php if ($count > 0): ?>
                <?php while ($result = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($result['sports_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($result['college_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($result['sports_location'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($result['sports_date'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo intval($result['first_prize']); ?></td>
                        <td><?php echo intval($result['second_prize']); ?></td>
                        <td><?php echo intval($result['third_prize']); ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php endif; ?>
        </table>
    </div>
</body>

</html>
