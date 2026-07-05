<?php
include "config/db.php";

if(isset($_GET['id'])){

    $id = (int)$_GET['id'];

    mysqli_query($conn, "DELETE FROM teachers WHERE id=$id");

    header("Location: view_teachers.php");
    exit();
}
?>