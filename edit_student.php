<?php
include "config/db.php";

if(!isset($_GET['id']) || empty($_GET['id'])){
    die("ERROR: No ID received");
}

$id = (int) $_GET['id'];

// GET DATA
$result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
$row = mysqli_fetch_assoc($result);

// UPDATE DATA
if(isset($_POST['update'])){

    $fullname = $_POST['fullname'];
    $department = $_POST['department'];
    $email = $_POST['email'];

    $sql = "UPDATE students SET 
            fullname='$fullname',
            department='$department',
            email='$email'
            WHERE id=$id";

    mysqli_query($conn, $sql);

    header("Location: students.php");
    exit();
}
?>

<h2>Edit Student</h2>

<form method="POST">

    <input type="text" name="fullname" value="<?php echo $row['fullname']; ?>" required>
    <br><br>

    <input type="text" name="department" value="<?php echo $row['department']; ?>" required>
    <br><br>

    <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
    <br><br>

    <button type="submit" name="update">Update</button>

</form>