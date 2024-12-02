<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style2.css">
<style>
table, th, td {
    border: 2px solid black;
}
</style>
</head>
<body>
<div class="container">

<div class="topnav">
    <div class="topnavleft" style="position:absolute; top:10px;">
        <a class="active" href="admin_home.php">Home</a>
        <a href="contact.html">Contact</a>
        <a href="about.html">About</a>
    </div>
    <div class="topnavright" style="float: right; position:absolute; top:4px; left:80%;">
        <a href="logout.php" style="position:absolute; top:14px; right:250px;">Logout</a>
        <div class="dropdown">
            <button class="dropbtn"><a href="#">Welcome <?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?></a>
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

<div style="position:relative; top:30px; right: 25%">
    <?php
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','sports');
    
    // Establish database connection using prepared statements
    try {
        $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $conn->prepare("SELECT * FROM sports_events");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<table>
            <tr>
                
                <th>Sports Name</th>
                <th>College Name</th>
                <th>Location</th>
                <th>Date</th>
                <th>1st Prize</th>
                <th>2nd Prize</th>
                <th>3rd Prize</th>
            </tr>";

        foreach ($result as $row) {
            echo "<tr>
                 
                    <td>" . htmlspecialchars($row["sports_name"], ENT_QUOTES, 'UTF-8') . "</td>
                    <td>" . htmlspecialchars($row["college_name"], ENT_QUOTES, 'UTF-8') . "</td>
                    <td>" . htmlspecialchars($row["sports_location"], ENT_QUOTES, 'UTF-8') . "</td>
                    <td>" . htmlspecialchars($row["sports_date"], ENT_QUOTES, 'UTF-8') . "</td>
                    <td>" . htmlspecialchars($row["first_prize"], ENT_QUOTES, 'UTF-8') . "</td>
                    <td>" . htmlspecialchars($row["second_prize"], ENT_QUOTES, 'UTF-8') . "</td>
                    <td>" . htmlspecialchars($row["third_prize"], ENT_QUOTES, 'UTF-8') . "</td>
                </tr>";
        }

        echo "</table>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>
</div>

<!-- <div style="position:relative; top:90px; left:10%; width:60%;">
    <form action="add_sports_event.php" method="POST">
        <input type="submit" name="Add" value="Add Data" style="width:20%;">
    </form>
</div> -->

</body>
</html>






    <!-- <?php
       define('DB_HOST','localhost');
       define('DB_USER','root');
       define('DB_PASS','');
       define('DB_NAME','sports');
       // Establish database connection.
       try
       {
       $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
       }
       catch (PDOException $e)
       {
       exit("Error: " . $e->getMessage());
       }
        $sql = "SELECT * FROM sports_events";
        $result = $conn->query($sql);

       

        $conn=null;
        ?> -->
    </div> 
</div>
    <div style = "position:relative; top:90px; left:10%; width:60%;">
        <form action="add_sports_event.php" method="POST">
            <input type="submit" name="Add" value="Add Data" style="width:20%;">
        </form> 
    </div>

</body>
</html>