<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("location: ../auth/login.php");
    exit();
}
?>
<link rel="stylesheet" href="../assets/style.css">
<a href="../auth/logout.php">🚪 Logout</a>
<br><br>
<?php
include("../config/db.php");
include("../includes/navbar.php");

$user_id = $_SESSION["user_id"];
echo "Logged In";
$sql = "SELECT * FROM tasks WHERE user_id='$user_id'";
$result = $conn->query($sql);
?>
<div class="container">
    <h2> Your Taks </h2>
    <a href="../tasks/create_task.php ">
        Add new tasks
    </a> <br><br>

    <?php
    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="task">
            <?php echo $row['task']; ?>
            <div class="actions">
                <a href="../tasks/edit_task.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="../tasks/delete_task.php?id=<?php echo $row['id']; ?>">Delete</a>
            </div>
        </div>
        <?php
    }
    ?>

</div>