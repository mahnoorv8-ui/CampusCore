<?php
include "config/db.php";

$id = $_GET['id'];

// Delete student
mysqli_query($conn, "DELETE FROM students WHERE id=$id");

// Go back to student list
header("Location: view_students.php");
exit();
?>