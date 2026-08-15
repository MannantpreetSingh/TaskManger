<?php
session_start();
include("../config/db.php");

$id = $_GET['id'];
$id = intval($_GET['id']);

$stmt = $conn->prepare("DELETE FROM tasks WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: ../dashboard/index.php");
exit();
header("Location: ../dashboard/index.php");
exit();
?>