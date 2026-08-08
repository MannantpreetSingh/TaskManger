<link rel="stylesheet" href="../assets/style.css">
<?php
session_start();
include("../config/db.php");

if (!isset($_SESSION['user_id'])) {
    header("location: ../auth/login.php");
    exit();
}
if (isset($_POST["add_task"])) {
    $title = $_POST["title"];
    $user_id = $_SESSION["user_id"];
    $sql = "INSERT INTO tasks(user_id,task) VALUES('$user_id' ,'$title')";

    if ($conn->query($sql)) {
        echo "task added";
        
    } else {
        echo "error" . $conn->error;
    }
}
?>
<div class="contanier">
<form method="POST">
    <h2>
        Add tasks
    </h2>
    <input type="text" name="title" placeholder="task tittle" required><br><br>
    <button type="submit" name="add_task">Add</button>

</form>
<a href="../dashboard/index.php">📋 View Tasks</a>
<br><br>
</div>