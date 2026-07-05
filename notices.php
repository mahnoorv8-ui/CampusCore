<?php
include "config/db.php";

$message="";

if(isset($_POST['save']))
{
    $title=$_POST['title'];
    $notice=$_POST['notice'];
    $date=$_POST['notice_date'];

    $sql="INSERT INTO notices(title,notice,notice_date)
          VALUES('$title','$notice','$date')";

    if(mysqli_query($conn,$sql))
    {
        $message="Notice Added Successfully!";
    }
}

$result=mysqli_query($conn,"SELECT * FROM notices ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>

<head>

<title>Notices</title>

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

.success{
color:green;
text-align:center;
}

input,textarea{
width:100%;
padding:10px;
margin:10px 0;
}

textarea{
height:120px;
resize:none;
}

button{
width:100%;
padding:12px;
background:#2563eb;
color:white;
border:none;
cursor:pointer;
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

<h1>Notice Management</h1>

<p class="success"><?php echo $message; ?></p>

<form method="POST">

<input type="text" name="title" placeholder="Notice Title" required>

<textarea name="notice" placeholder="Write Notice Here..." required></textarea>

<input type="date" name="notice_date" required>

<button name="save">Publish Notice</button>

</form>

<table>

<tr>

<th>ID</th>
<th>Title</th>
<th>Notice</th>
<th>Date</th>

</tr>
<?php
while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['title']; ?></td>

<td><?php echo $row['notice']; ?></td>

<td><?php echo $row['notice_date']; ?></td>

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