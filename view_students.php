<?php
include "config/db.php";

// Search
if(isset($_GET['search']) && $_GET['search'] != "")
{
    $search = mysqli_real_escape_string($conn, $_GET['search']);

    $sql = "SELECT * FROM students
            WHERE fullname LIKE '%$search%'
            OR rollno LIKE '%$search%'
            ORDER BY id DESC";
}
else
{
    $sql = "SELECT * FROM students ORDER BY id DESC";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>

<title>View Students</title>

<style>

body{
    font-family:Arial;
    background:#f4f4f4;
    margin:0;
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

.search-box{
    margin:20px 0;
}

.search-box input{
    width:300px;
    padding:10px;
}

.search-box button{
    padding:10px 20px;
    background:#2563eb;
    color:white;
    border:none;
    cursor:pointer;
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#2563eb;
    color:white;
    padding:12px;
}

td{
    padding:10px;
    text-align:center;
    border:1px solid #ddd;
}

tr:nth-child(even){
    background:#f9f9f9;
}

.edit{
    background:green;
    color:white;
    padding:6px 12px;
    text-decoration:none;
    border-radius:5px;
}

.delete{
    background:red;
    color:white;
    padding:6px 12px;
    text-decoration:none;
    border-radius:5px;
}

</style>

</head>

<body>

<div class="container">

<h1>Student List</h1>

<div class="search-box">

<form method="GET">

<input
type="text"
name="search"
placeholder="Search by Name or Roll No"
value="<?php if(isset($_GET['search'])) echo $_GET['search']; ?>">

<button type="submit">
Search
</button>

</form>

</div>

<table>

<tr>

<th>ID</th>
<th>Full Name</th>
<th>Roll No</th>
<th>Department</th>
<th>Semester</th>
<th>Email</th>
<th>Edit</th>
<th>Delete</th>

</tr>
<?php
while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['fullname']; ?></td>

<td><?php echo $row['rollno']; ?></td>

<td><?php echo $row['department']; ?></td>

<td><?php echo $row['semester']; ?></td>

<td><?php echo $row['email']; ?></td>

<td>
<a class="edit" href="edit_student.php?id=<?php echo $row['id']; ?>">
Edit
</a>
</td>

<td>
<a class="delete"
href="delete_student.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Are you sure you want to delete this student?');">
Delete
</a>
</td>

</tr>

<?php
}
?>

</table>

<br><br>

<a href="dashboard.php"
style="background:#2563eb;
color:white;
padding:10px 20px;
text-decoration:none;
border-radius:5px;">
← Back to Dashboard
</a>

</div>

</body>
</html>