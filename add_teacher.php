<?php
include "config/db.php";

$message = "";

if(isset($_POST['save']))
{
    $fullname = $_POST['fullname'];
    $department = $_POST['department'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];

    $sql = "INSERT INTO teachers(fullname,department,subject,email)
            VALUES('$fullname','$department','$subject','$email')";

    if(mysqli_query($conn,$sql))
    {
        $message = "Teacher Added Successfully!";
    }
    else
    {
        $message = "Error!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Teacher</title>

<style>

body{
    font-family:Arial;
    background:#f4f4f4;
}

.container{
    width:500px;
    margin:40px auto;
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0 0 10px gray;
}

input{
    width:100%;
    padding:12px;
    margin:10px 0;
}

button{
    width:100%;
    padding:12px;
    background:#2563eb;
    color:white;
    border:none;
    cursor:pointer;
}

h2{
    text-align:center;
}

.success{
    color:green;
    text-align:center;
}

</style>

</head>

<body>

<div class="container">

<h2>Add Teacher</h2>

<p class="success"><?php echo $message; ?></p>

<form method="POST">

<input type="text" name="fullname" placeholder="Teacher Name" required>

<input type="text" name="department" placeholder="Department" required>

<input type="text" name="subject" placeholder="Subject" required>

<input type="email" name="email" placeholder="Email" required>

<button name="save">Save Teacher</button>

</form>

</div>

</body>
</html>