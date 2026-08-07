<?php
session_start();
include("../config/db.php");
if (!isset($_SESSION["user_id"])) {
    header("location: ../auth/login.php");
    exit();
}
$user_id = $_SESSION["user_id"];
echo "Logged in user_id: " . $user_id . "<br>";
$sql = " SELECT* FROM tasks WHERE user_id ='$user_id'";
$result = $conn->query($sql);
?>
<h2> Your Taks </h2>
<a href="../tasks/create_task.php ">
    Add new tasks
</a> <br><br>
<?php
while ($row = $result->fetch_assoc()) {
    echo $row['task'] . "<br>";
    echo "<a href='../tasks/delete_task.php?id=" . $row['id'] . "'>Delete</a><br><br>";
}
?>