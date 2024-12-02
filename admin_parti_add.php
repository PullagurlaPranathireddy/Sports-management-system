<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'sports');

// Establish database connection.
try {
    $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Validate and sanitize user inputs
    $sid = filter_var($_POST['sid'], FILTER_SANITIZE_STRING);
    $loc = filter_var($_POST['location'], FILTER_SANITIZE_STRING);
    $date = $_POST['DOS']; // No need to sanitize date input
    $snm = filter_var($_POST['sname'], FILTER_SANITIZE_STRING);
    $ps = filter_var($_POST['pos'], FILTER_SANITIZE_STRING);

    try {
        // Prepare the SQL query with placeholders
        $query = "INSERT INTO participation (student_id, location, date, sports_name, position) VALUES (:sid, :loc, :date, :snm, :ps)";
        
        // Prepare the statement
        $stmt = $conn->prepare($query);
        
        // Bind parameters
        $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
        $stmt->bindParam(':loc', $loc, PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->bindParam(':snm', $snm, PDO::PARAM_STR);
        $stmt->bindParam(':ps', $ps, PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            echo "<script>alert('Record Created')</script>";
        } else {
            echo "<script>alert('Failed To Create The Record')</script>";
        }
    } catch (PDOException $e) {
        error_log('Error: ' . $e->getMessage()); // Log the error
        echo 'An error occurred while processing your request. Please try again later.';
    }
}
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


        <h1>Enter your details Of Participation.</h1>
        <form action="" method="post">
            <fieldset>
                <legend>Details</legend>
                <label for="s_id">Student Id</label>
                <input type="text" name="sid" id="s_id" placeholder="Enter student id" required><br>
                <label for="loc">Location</label>
                <input type="text" name="location" id="loc" placeholder="Enter Location" required><br>
                <label for="dos">Sports Date</label>
                <input type="date" name="DOS" id="dos" required><br>
                <label for="s_name">Sports Name</label>
                <input type="text" name="sname" id="s_name" placeholder="Enter sports name" required><br>
                <label for="p_id">Position</label>
                <input type="text" name="pos" id="p_id" placeholder="Enter position" required><br>
            </fieldset>
            <input type="submit" name="submit">
            <input type="reset" name="reset">
        </form>
    </div>

</body>

</html>



    
    
    
                



