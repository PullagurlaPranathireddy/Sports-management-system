<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <style>
        table,
        th,
        td {
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
            include("conn.php");

            try {
                $conn = new PDO("mysql:host=localhost;dbname=sports", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT s.name, s.department, s.id, p.sports_name, p.location, p.date, p.position FROM participation p, student_info s WHERE p.student_id=s.id";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    echo "<table>
                        <tr>
                    
                        <th>Name</th>
                        <th>Department</th>
                        <th>Id</th>
                        <th>Sports Name</th>
                        <th>Location</th>
                        <th>Date</th>
                        <th>Position</th>
                        <th colspan=2 align=center>Operations</th>
                        </tr>";

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>
                           
                        
                            <td>" . htmlspecialchars($row["name"], ENT_QUOTES, 'UTF-8') . "</td>
                            <td>" . htmlspecialchars($row["department"], ENT_QUOTES, 'UTF-8') . "</td>
                            <td>" . htmlspecialchars($row["id"], ENT_QUOTES, 'UTF-8') . "</td>
                            <td>" . htmlspecialchars($row["sports_name"], ENT_QUOTES, 'UTF-8') . "</td>
                            <td>" . htmlspecialchars($row["location"], ENT_QUOTES, 'UTF-8') . "</td>
                            <td>" . htmlspecialchars($row["date"], ENT_QUOTES, 'UTF-8') . "</td>
                            <td>" . htmlspecialchars($row["position"], ENT_QUOTES, 'UTF-8') . "</td>
                            <td><a href='admin_parti_update.php?id=" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "&nm=" . htmlspecialchars($row['sports_name'], ENT_QUOTES, 'UTF-8') . "&loc=" . htmlspecialchars($row['location'], ENT_QUOTES, 'UTF-8') . "&dt=" . htmlspecialchars($row['date'], ENT_QUOTES, 'UTF-8') . "&pos=" . htmlspecialchars($row['position'], ENT_QUOTES, 'UTF-8') . "' onclick='return checkdelete()'>Edit/Update</td>
                            <td><a href='admin_parti_delete.php?id=" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "' onclick='return checkdelete()'>Delete</td>
                            </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
            } catch (PDOException $e) {
                error_log('Error: ' . $e->getMessage()); // Log the error
                echo 'An error occurred while processing your request. Please try again later.';
            }
            ?>
        </div>
    </div>

    <div style="position:relative; top:90px; left:10%; width:60%;">
        <form action="admin_parti_add.php" method="POST">
            <input type="submit" name="Add" value="Add Data" style="width:20%;">
        </form>
    </div>

    <script>
        function checkdelete() {
            return confirm("Are you sure you want to delete this record?");
        }
    </script>

</body>

</html>

