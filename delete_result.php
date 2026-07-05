<?php
$conn = mysqli_connect("localhost", "root", "", "campuscore");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get ID from URL
$id = $_GET['id'];

// Delete record
$sql = "DELETE FROM results WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo "<script>
        alert('Record deleted successfully');
        window.location='results.php';
    </script>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>