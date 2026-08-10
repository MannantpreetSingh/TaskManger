<style>
    .navbar {
        background: 007bff;
        padding: 15px;
        color: black;
        display: flex;
        justify-content: space-between;
    }

    .navbar a {
        color: blzck;
        margin: left 15px;
        text-decoration: none;
    }

    .navbar a:hover {
        text-decoration: underline;
    }
</style>
<div class="navbar">
    <div>
        <strong>Task Manger</strong>
    </div>
    <div>
        <?php if (isset($_SESSION["user_id"])) { ?>

            <span>
                Welcome, <?php echo !empty($_SESSION["username"]) ? $_SESSION["username"] : "User"; ?> 👋
            </span>

            <a href="../dashboard/index.php">Dashboard</a>
            <a href="../tasks/create_task.php">Add Task</a>
            <a href="../auth/logout.php">Logout</a>
        <?php } else { ?>
            <a href="../auth/login.php">Login</a>
            <a href="../auth/register.php">Register</a>
        <?php } ?>
    </div>

</div>