<?php
include("conn.php");
error_reporting(0);

$id = $_GET["id"];
// Use prepared statement to prevent SQL injection
$query = $conn->prepare("DELETE FROM participation WHERE pid = ?");
$query->bind_param("i", $id);
$query->execute();

if ($query->affected_rows > 0) {
    echo "<script>alert('Record Deleted')</script>";
    header("refresh:1; url=http://localhost/Sports/admin_parti_show.php");
} else {
    echo "<script>alert('Failed to Delete Record from Database')</script>";
    header("refresh:1; url=http://localhost/Sports/admin_parti_show.php");
}

$query->close();
$conn->close();
?>
