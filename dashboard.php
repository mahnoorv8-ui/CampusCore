<?php
include "config/db.php";

$students = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM students"));
$teachers = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM teachers"));
$notices = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM notices"));
?>

<!DOCTYPE html>
<html>
<head>

<title>CampusCore Dashboard</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial;
}

body{
display:flex;
background:#f4f6f9;
}

.sidebar{
width:250px;
height:100vh;
background:#2563eb;
padding-top:10px;
position:fixed;
overflow-y:auto;
}

.sidebar h2{
color:white;
text-align:center;
margin-bottom:30px;
}

.sidebar a{
display:block;
color:white;
padding:15px 20px;
text-decoration:none;
}

.sidebar a:hover{
background:#1d4ed8;
}

.main{
margin-left:250px;
padding:30px;
width:100%;
}

.main h1{
margin-bottom:25px;
}

.cards{
display:grid;
grid-template-columns:repeat(3,1fr);
gap:20px;
}

.card{
background:white;
padding:30px;
border-radius:18px;
box-shadow:0 8px 20px rgba(170, 139, 139, 0.12);
text-align:center;
transition:0.3s;
cursor:pointer;
}

.card:hover{
transform:translateY(-5px);
box-shadow:0 12px 25px rgba(81, 87, 102, 0.25);
}


.card h2{
font-size:42px;
color:#2563eb;
margin-top:10px;
font-weight:bold;
}

.card h3{
color:#555;
font-size:18px;
}


.quick{
margin-top:40px;
}

.quick a{
display:inline-block;
padding:14px 22px;
background:#2563eb;
color:white;
text-decoration:none;
border-radius:12px;
margin-right:12px;
margin-top:12px;
font-weight:bold;
box-shadow:0 5px 12px rgba(37,99,235,.3);
transition:.3s;
}

.quick a:hover{
background:#1d4ed8;
transform:translateY(-3px);
}

</style>

</head>

<body>

<div class="sidebar">

<<div style="text-align:center; padding:20px;">

<div style="
width:60px;
height:60px;
background:white;
border-radius:50%;
margin:auto;
display:flex;
align-items:center;
justify-content:center;
font-size:40px;
color:#2563eb;
font-weight:bold;
">
🎓
</div>

<h1 style="
color:white;
font-size:22px;
margin-top:15px;
margin-bottom:5px;
">
CampusCore
</h1>

<p style="
color:#dbeafe;
font-size:13px;
">
University Management System
</p>

</div>

<a href="dashboard.php">🏠 Dashboard</a>
<a href="add_student.php">➕ Add Student</a>
<a href="view_students.php">👨‍🎓 Students</a>
<a href="add_teacher.php">👨‍🏫 Add Teacher</a>
<a href="view_teachers.php">📋 Teachers</a>
<a href="attendance.php">📅 Attendance</a>
<a href="results.php">📝 Results</a>
<a href="notices.php">📢 Notices</a>
<a href="logout.php">🚪 Logout</a>

</div>

<div class="main">

<h1>Welcome Admin 👋</h1>

<p style="color:#666;font-size:16px;margin-top:8px;">
<?php echo date("l, d F Y"); ?>
</p>


<div class="cards">

<div class="card">
<h3>Total Students</h3>
<h2><?php echo $students['total']; ?></h2>
</div>

<div class="card">
<h3>Total Teachers</h3>
<h2><?php echo $teachers['total']; ?></h2>
</div>

<div class="card">
<h3>Total Notices</h3>
<h2><?php echo $notices['total']; ?></h2>
</div>

</div>

<div class="quick">

<h2>Quick Actions</h2>

<a href="add_student.php">Add Student</a>
<a href="view_students.php">View Students</a>
<a href="add_teacher.php">Add Teacher</a>
<a href="attendance.php">Attendance</a>
<a href="results.php">Results</a>
<a href="notices.php">Notices</a>

</div>
<br><br>

<h2>Recent Students</h2>

<table style="
width:100%;
border-collapse:collapse;
margin-top:20px;
background:white;
border-radius:15px;
overflow:hidden;
box-shadow:0 8px 20px rgba(0,0,0,.12);
">
<tr style="background:#2563eb; color:white; height:55px;">

<th style="padding:12px;">ID</th>
<th style="padding:12px;">Name</th>
<th style="padding:12px;">Roll No</th>
<th style="padding:12px;">Department</th>
<th style="padding:12px;">Semester</th>

</tr>

<?php

$result = mysqli_query($conn, "SELECT * FROM students ORDER BY id DESC LIMIT 5");

while($row = mysqli_fetch_assoc($result))
{

?>

<tr>

<td style="padding:20px; border-bottom:1px solid #eee; text-align:center;">
<?php echo $row['id']; ?>
</td>

<td style="padding:20px; border-bottom:1px solid #eee; text-align:center;">
<?php echo $row['fullname']; ?>
</td>

<td style="padding:20px; border-bottom:1px solid #eee; text-align:center;">
<?php echo $row['rollno']; ?>
</td>

<td style="padding:20px; border-bottom:1px solid #eee; text-align:center;">
<?php echo $row['department']; ?>
</td>

<td style="padding:20px; border-bottom:1px solid #eee; text-align:center;">
<?php echo $row['semester']; ?>
</td>

</tr>

<?php

}

?>

</table>

</div>

</body>
</html>