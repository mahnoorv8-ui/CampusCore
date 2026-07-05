<?php
include "config/db.php";

$result = mysqli_query($conn, "SELECT * FROM students");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Students - CampusCore</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

<div class="sidebar">
    <h2><i class="fa-solid fa-graduation-cap"></i> CampusCore</h2>

    <a href="dashboard.php"><i class="fa-solid fa-gauge"></i> Dashboard</a>
    <a href="students.php"><i class="fa-solid fa-user-graduate"></i> Students</a>
    <a href="#"><i class="fa-solid fa-chalkboard-user"></i> Teachers</a>
    <a href="#"><i class="fa-solid fa-book"></i> Courses</a>
    <a href="#"><i class="fa-solid fa-square-poll-vertical"></i> Results</a>
    <a href="#"><i class="fa-solid fa-bell"></i> Notices</a>
    <a href="#"><i class="fa-solid fa-gear"></i> Settings</a>
</div>

<div class="main">

    <div class="header">
        <h1>Students</h1>

        <div class="search-box">
            <input type="text" placeholder="Search student...">
        </div>
    </div>

    <a href="#" class="btn">+ Add Student</a>

    <br><br>

    <table>

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

        <tr>

            <td><?php echo $row['id']; ?></td>

            <td><?php echo $row['fullname']; ?></td>

            <td><?php echo $row['department']; ?></td>

            <td><?php echo $row['email']; ?></td>

            <td>

                <a href="edit_student.php?id=<?php echo $row['id']; ?>" class="btn edit">
                    Edit
                </a>

                <a href="delete_student.php?id=<?php echo $row['id']; ?>"
                   class="btn delete"
                   onclick="return confirm('Delete this student?');">
                    Delete
                </a>

            </td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>