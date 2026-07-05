<?php
$conn = mysqli_connect("localhost", "root", "", "campuscore");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get ID from URL
$id = $_GET['id'];

// Fetch existing record
$sql = "SELECT * FROM results WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Update record when form is submitted
if (isset($_POST['update'])) {
    $student_name = $_POST['student_name'];
    $roll_no = $_POST['roll_no'];
    $subject = $_POST['subject'];
    $marks = $_POST['marks'];
    $grade = $_POST['grade'];

    $update = "UPDATE results SET 
        student_name='$student_name',
        roll_no='$roll_no',
        subject='$subject',
        marks='$marks',
        grade='$grade'
        WHERE id=$id";

    if (mysqli_query($conn, $update)) {
        echo "<script>alert('Record updated successfully'); window.location='results.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<h2>Edit Result</h2>

<form method="POST">
    Student Name: <br>
    <input type="text" name="student_name" value="<?php echo $row['student_name']; ?>" required><br><br>

    Roll No: <br>
    <input type="text" name="roll_no" value="<?php echo $row['roll_no']; ?>" required><br><br>

    Subject: <br>
    <input type="text" name="subject" value="<?php echo $row['subject']; ?>" required><br><br>

    Marks: <br>
    <input type="number" name="marks" value="<?php echo $row['marks']; ?>" required><br><br>

    Grade: <br>
    <input type="text" name="grade" value="<?php echo $row['grade']; ?>" required><br><br>

    <button type="submit" name="update">Update</button>
</form>