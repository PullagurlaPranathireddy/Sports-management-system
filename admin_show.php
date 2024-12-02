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

    <div class="topnavright" style="float: right; position:absolute; top:4px; left:80%">
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

<div style="position:relative; top:230px; right:53%;">
    <?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'sports');

    try {
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM student_info");
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "<table>
            <tr>
    
            <th>Dp</th>
            <th>Name</th>
            <th>Id</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Gender</th>
            <th>Date Of Birth</th>
            <th>Department</th>
            <th>Year</th>
            <th>Sports</th>
            <th>Player</th>
            <th colspan=2 align=center>Operations</th>
            </tr>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
              
                <td><img src='./Dp/" . htmlspecialchars($row["myfile"], ENT_QUOTES, 'UTF-8') . "' height='50px' width='50px'></td>
                <td>" . htmlspecialchars($row["name"], ENT_QUOTES, 'UTF-8') . "</td>
                <td>" . htmlspecialchars($row["id"], ENT_QUOTES, 'UTF-8') . "</td>
                <td>" . htmlspecialchars($row["email"], ENT_QUOTES, 'UTF-8') . "</td>
                <td>" . htmlspecialchars($row["contact"], ENT_QUOTES, 'UTF-8') . "</td>
                <td>" . htmlspecialchars($row["gender"], ENT_QUOTES, 'UTF-8') . "</td>
                <td>" . htmlspecialchars($row["DOB"], ENT_QUOTES, 'UTF-8') . "</td>
                <td>" . htmlspecialchars($row["department"], ENT_QUOTES, 'UTF-8') . "</td>
                <td>" . htmlspecialchars($row["year"], ENT_QUOTES, 'UTF-8') . "</td>
                <td>" . htmlspecialchars($row["sports"], ENT_QUOTES, 'UTF-8') . "</td>
                <td>" . htmlspecialchars($row["player"], ENT_QUOTES, 'UTF-8') . "</td>
                <td><a href='update.php?id=" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "&nm=" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "&rl=" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "&em=" . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "&con=" . htmlspecialchars($row['contact'], ENT_QUOTES, 'UTF-8') . "&gn=" . htmlspecialchars($row['gender'], ENT_QUOTES, 'UTF-8') . "&db=" . htmlspecialchars($row['DOB'], ENT_QUOTES, 'UTF-8') . "&dp=" . htmlspecialchars($row['department'], ENT_QUOTES, 'UTF-8') . "&ye=" . htmlspecialchars($row['year'], ENT_QUOTES, 'UTF-8') . "' onclick='return checkdelete()'>Edit/Update</td>
                <td><a href='delete.php?id=" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "' onclick='return checkdelete()'>Delete</td>
                </tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
    ?>
</div>

<div style="position:relative; top:50px; right:0%;">
    <form action="search.php" method="POST">
        <label for="id_num">Name Of Student</label>
        <input type="text" name="name" id="id_num" placeholder="Enter Name Of The Student" required><br>
        <input type="submit" name="search" value="Search">
    </form>
</div>
</div>
</body>
</html>
