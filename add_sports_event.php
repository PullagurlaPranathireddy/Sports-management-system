<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root'); // Replace with your database username
define('DB_PASS', ''); // Replace with your database password
define('DB_NAME', 'sports');

try {
    $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log('Database Connection Error: ' . $e->getMessage()); // Log the error
    exit("An error occurred while connecting to the database.");
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
    $snm = htmlspecialchars($_POST['sname'], ENT_QUOTES, 'UTF-8');
    $cnm = htmlspecialchars($_POST['cname'], ENT_QUOTES, 'UTF-8');
    $sl = htmlspecialchars($_POST['sloc'], ENT_QUOTES, 'UTF-8');
    $dos = htmlspecialchars($_POST['DOB'], ENT_QUOTES, 'UTF-8');
    $fp = intval($_POST['fprize']);
    $sp = intval($_POST['sprize']);
    $tp = intval($_POST['tprize']);

    try {
        $query = "INSERT INTO sports_events (sports_name, college_name, sports_location, sports_date, first_prize, second_prize, third_prize) VALUES (:snm, :cnm, :sl, :dos, :fp, :sp, :tp)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':snm', $snm, PDO::PARAM_STR);
        $stmt->bindParam(':cnm', $cnm, PDO::PARAM_STR);
        $stmt->bindParam(':sl', $sl, PDO::PARAM_STR);
        $stmt->bindParam(':dos', $dos, PDO::PARAM_STR);
        $stmt->bindParam(':fp', $fp, PDO::PARAM_INT);
        $stmt->bindParam(':sp', $sp, PDO::PARAM_INT);
        $stmt->bindParam(':tp', $tp, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "<script>alert('Record Created')</script>";
            header("refresh:1; url=http://localhost/Sports/admin_show_sports.php");
            exit(); // Exit after redirect
        } else {
            echo "<script>alert('Failed To Create The Record')</script>";
            header("refresh:1; url=http://localhost/Sports/admin_show_sports.php");
            exit(); // Exit after redirect
        }
    } catch (PDOException $e) {
        error_log('Database Error: ' . $e->getMessage()); // Log the error
        echo 'An error occurred while processing your request. Please try again later.';
        exit(); // Exit after displaying the error message
    }
}

$conn = null;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <title>Add Details</title>
</head>
<body>
<div class="container">

    <div style="position:relative; top:25px; left:0px">
        <h1>Enter your details for sports event.</h1>
        <form action="" method="post">
            <fieldset>
                <legend>Details</legend>
                <label for="s_name">Sports Name</label>
                <input type="text" name="sname" id="s_name" placeholder="Enter Sports Name"><br>
                <label for="c_name">College Name</label>
                <input type="text" name="cname" id="c_name" placeholder="Enter College Name"><br>
                <label for="s_loc">Sports Location</label>
                <input type="text" name="sloc" id="s_loc" placeholder="Enter Sports Location"><br>
                <label for="dob">Sports Date</label>
                <input type="date" name="DOB" id="dob"><br>
                <label for="f_prize">1st Prize</label>
                <input type="text" name="fprize" id="f_prize" placeholder="Enter Rs"><br>
                <label for="s_prize">2nd Prize</label>
                <input type="text" name="sprize" id="s_prize" placeholder="Enter Rs"><br>
                <label for="t_prize">3rd Prize</label>
                <input type="text" name="tprize" id="t_prize" placeholder="Enter Rs"><br>
            </fieldset>
            <input type="submit" name="submit">
            <input type="reset" name="reset">
        </form>
    </div>
</div>

<div style="position:relative; top:-750px; left:10%; width:40%;">
    <form action="admin_show_sports.php" method="POST">
        <input type="submit" name="Back" value="Back" style="width:20%;">
    </form>
</div>

</body>
</html>

