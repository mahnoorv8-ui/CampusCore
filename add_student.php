<?php
include "config/db.php";

$message = "";

if(isset($_POST['save']))
{
    $fullname = $_POST['fullname'];
    $rollno = $_POST['rollno'];
    $department = $_POST['department'];
    $semester = $_POST['semester'];
    $email = $_POST['email'];

    $sql = "INSERT INTO students(fullname,rollno,department,semester,email)
            VALUES('$fullname','$rollno','$department','$semester','$email')";

    if(mysqli_query($conn,$sql))
    {
        $message = "Student Added Successfully!";
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
    <title>Add Student</title>

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

        h2{
            text-align:center;
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

        p{
            color:green;
            text-align:center;
        }

    </style>

</head>

<body>

<div class="container">

<h2>Add Student</h2>

<p><?php echo $message; ?></p>

<form method="POST">

<input type="text" name="fullname" placeholder="Full Name" required>

<input type="text" name="rollno" placeholder="Roll Number" required>

<input type="text" name="department" placeholder="Department" required>

<input type="text" name="semester" placeholder="Semester" required>

<input type="email" name="email" placeholder="Email" required>

<button name="save">Save Student</button>

</form>

</div>

</body>

</html>