<?php
session_start();
include("../config/db.php");

$id=$_GET['id'];
$sql="DELETE FROM TASKS WHERE id='$id'";
$conn->query($sql);
header("Location: ../dashboard/index.php");
?>