<?php
include "config/db.php";

$result = mysqli_query($conn, "SELECT * FROM teachers ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>

<title>View Teachers</title>

<style>

body{
    font-family:Arial;
    background:#f4f4f4;
    padding:30px;
}

.container{
    width:95%;
    margin:auto;
    background:white;
    padding:20px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,.2);
}

h1{
    text-align:center;
    color:#2563eb;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:20px;
}

th{
    background:#2563eb;
    color:white;
    padding:12px;
}

td{
    border:1px solid #ddd;
    padding:10px;
    text-align:center;
}

tr:nth-child(even){
    background:#f9f9f9;
}

.btn{
    color:white;
    padding:8px 15px;
    text-decoration:none;
    border-radius:5px;
    margin:2px;
}

.edit{
    background:#10b981;
}

.delete{
    background:#ef4444;
}

.back{
    background:#2563eb;
}

</style>

</head>

<body>

<div class="container">

<h1>Teacher List</h1>

<table>

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Department</th>
    <th>Subject</th>
    <th>Email</th>
    <th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['fullname']; ?></td>
<td><?php echo $row['department']; ?></td>
<td><?php echo $row['subject']; ?></td>
<td><?php echo $row['email']; ?></td>

<td>
    <a href="edit_teacher.php?id=<?php echo $row['id']; ?>" class="btn edit">Edit</a>

    <a href="delete_teacher.php?id=<?php echo $row['id']; ?>"
       class="btn delete"
       onclick="return confirm('Delete this teacher?');">
       Delete
    </a>
</td>

</tr>

<?php } ?>

</table>

<br>

<a class="btn back" href="dashboard.php">← Back to Dashboard</a>

</div>

</body>
</html>