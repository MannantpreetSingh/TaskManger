<link rel="stylesheet" href="../assets/style.css">
<?php
session_start();
include("../config/db.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = intval($_POST['id']);
    $title = $_POST["title"];

    $update_sql = "UPDATE tasks SET task='$title' WHERE id=$id";

    if ($conn->query($update_sql)) {
        header("Location: ../dashboard/index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}


if (!isset($_GET['id'])) {
    echo "No ID!";
    exit();
}

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM tasks WHERE id=$id");
$task = $result->fetch_assoc();
?>
<div class="container">
<h2>Edit Task</h2>

<form method="POST">
    <input type="hidden" name="id" value="<?php echo $task['id']; ?>">

    <input type="text" name="title"
           value="<?php echo $task['task']; ?>" required>

    <br><br>

    <button type="submit">Update</button>
</form>
</div>