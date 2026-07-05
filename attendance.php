<?php
include "config/db.php";

$message = "";

if(isset($_POST['save']))
{
    $student_name = $_POST['student_name'];
    $roll_no = $_POST['roll_no'];
    $attendance_date = $_POST['attendance_date'];
    $status = $_POST['status'];

    $sql = "INSERT INTO attendance(student_name,roll_no,attendance_date,status)
            VALUES('$student_name','$roll_no','$attendance_date','$status')";

    if(mysqli_query($conn,$sql))
    {
        $message = "Attendance Saved Successfully!";
    }
    else
    {
        $message = "Error!";
    }
}

$result = mysqli_query($conn,"SELECT * FROM attendance ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Attendance</title>

<style>

body{
    font-family:Arial;
    background:#f4f4f4;
    margin:0;
}

.container{
    width:90%;
    margin:30px auto;
    background:white;
    padding:20px;
    border-radius:10px;
    box-shadow:0 0 10px gray;
}

h1{
    text-align:center;
    color:#2563eb;
}

input,select{
    width:100%;
    padding:10px;
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

.success{
    color:green;
    text-align:center;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:30px;
}

th{
    background:#2563eb;
    color:white;
    padding:10px;
}

td{
    border:1px solid #ddd;
    padding:10px;
    text-align:center;
}

</style>

</head>

<body>

<div class="container">

<h1>Attendance Management</h1>

<p class="success"><?php echo $message; ?></p>

<form method="POST">

<input type="text" name="student_name" placeholder="Student Name" required>

<input type="text" name="roll_no" placeholder="Roll Number" required>

<input type="date" name="attendance_date" required>

<select name="status">
<option value="Present">Present</option>
<option value="Absent">Absent</option>
</select>

<button name="save">Save Attendance</button>

</form>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Roll No</th>
<th>Date</th>
<th>Status</th>
</tr>
<?php
while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['student_name']; ?></td>

<td><?php echo $row['roll_no']; ?></td>

<td><?php echo $row['attendance_date']; ?></td>

<td><?php echo $row['status']; ?></td>

</tr>

<?php
}
?>

</table>

<br><br>

<a href="dashboard.php"
style="
background:#2563eb;
color:white;
padding:10px 20px;
text-decoration:none;
border-radius:5px;
">
← Back to Dashboard
</a>

</div>

</body>
</html>