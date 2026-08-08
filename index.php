<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

<div class="container">

    <h2>Welcome to Task Manager</h2>

    <?php if (isset($_SESSION["user_id"])) { ?>
        <a href="dashboard/index.php">
            <button>Go to Dashboard</button>
        </a>
    <?php } else { ?>
        <a href="auth/login.php">
            <button>Login</button>
        </a>

        <br><br>

        <a href="auth/register.php">
            <button>Register</button>
        </a>
    <?php } ?>

</div>

</body>
</html>