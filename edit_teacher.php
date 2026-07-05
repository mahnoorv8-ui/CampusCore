<?php
include "config/db.php";

if(!isset($_GET['id'])){
    die("Teacher ID not found.");
}

$id = (int)$_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM teachers WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $fullname = $_POST['fullname'];
    $department = $_POST['department'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];

    mysqli_query($conn,"UPDATE teachers SET
        fullname='$fullname',
        department='$department',
        subject='$subject',
        email='$email'
        WHERE id=$id");

    header("Location: view_teachers.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Teacher</title>

<style>
body{
    font-family:Arial;
    background:#f4f4f4;
}

.container{
    width:500px;
    margin:40px auto;
    background:white;
    padding:25px;
    border-radius:10px;
}

input{
    width:100%;
    padding:10px;
    margin:10px 0;
}

button{
    background:#2563eb;
    color:white;
    border:none;
    padding:10px 20px;
    cursor:pointer;
}
</style>

</head>
<body>

<div class="container">

<h2>Edit Teacher</h2>

<form method="POST">

<input type="text" name="fullname" value="<?php echo $row['fullname']; ?>" required>

<input type="text" name="department" value="<?php echo $row['department']; ?>" required>

<input type="text" name="subject" value="<?php echo $row['subject']; ?>" required>

<input type="email" name="email" value="<?php echo $row['email']; ?>" required>

<button type="submit" name="update">Update Teacher</button>

</form>

</div>

</body>
</html>