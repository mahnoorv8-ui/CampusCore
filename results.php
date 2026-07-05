<?php
include "config/db.php";

$message = "";

if(isset($_POST['save']))
{
    $student_name = $_POST['student_name'];
    $roll_no = $_POST['roll_no'];
    $subject = $_POST['subject'];
    $marks = $_POST['marks'];

    if($marks >= 90)
        $grade = "A+";
    elseif($marks >= 80)
        $grade = "A";
    elseif($marks >= 70)
        $grade = "B";
    elseif($marks >= 60)
        $grade = "C";
    elseif($marks >= 50)
        $grade = "D";
    else
        $grade = "F";

    $sql = "INSERT INTO results(student_name,roll_no,subject,marks,grade)
            VALUES('$student_name','$roll_no','$subject','$marks','$grade')";

    if(mysqli_query($conn,$sql))
    {
        $message = "Result Saved Successfully!";
    }
    else
    {
        $message = "Error Saving Result!";
    }
}

$result = mysqli_query($conn,"SELECT * FROM results ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>

<title>Results Management</title>

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

input{
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

<h1>Results Management</h1>

<p class="success"><?php echo $message; ?></p>

<form method="POST">

<input type="text" name="student_name" placeholder="Student Name" required>

<input type="text" name="roll_no" placeholder="Roll Number" required>

<input type="text" name="subject" placeholder="Subject" required>

<input type="number" name="marks" placeholder="Marks" required>

<button name="save">Save Result</button>

</form>

<table>



<tr>
<th>ID</th>
<th>Student</th>
<th>Roll No</th>
<th>Subject</th>
<th>Marks</th>
<th>Grade</th>
<th>Action</th>
</tr>


<?php
while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['student_name']; ?></td>

<td><?php echo $row['roll_no']; ?></td>

<td><?php echo $row['subject']; ?></td>

<td><?php echo $row['marks']; ?></td>

<td><?php echo $row['grade']; ?></td>

</tr>
<td>
<a href="edit_result.php?id=<?php echo $row['id']; ?>">✏️ Edit</a> |
<a href="delete_result.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete this result?')">🗑️ Delete</a>
</td>
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
text-decoration:none;
">
← Back to Dashboard
</a>

</div>

</body>
</html>