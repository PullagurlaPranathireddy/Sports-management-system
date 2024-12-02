<?php
include("conn.php");
error_reporting(0);

$id=$_GET["id"];
$query="DELETE FROM student_info WHERE id = '$id'";
$data=mysqli_query($conn,$query);

if($data)
{
    echo "<script>alert('Record Deleted')</script>";
    ?>
    <meta http-equiv="refresh" content="1; url=http://localhost/Sports_Management_System-main/Sports/admin_show.php">
     <?php
}
else
{
    echo "<script>alert('Failed to Delete Record from Database')</script>";
    ?>
    <meta http-equiv="refresh" content="1; url=http://localhost/Sports_Management_System-main/Sports/admin_show.php">
    <?php
}
$conn->close();
?>
