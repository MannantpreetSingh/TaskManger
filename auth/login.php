<?php
session_start();
include("../config/db.php");

if (isset($_POST['login'])) {

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {

        $user = $result->fetch_assoc();

        if (password_verify($password, $user['PASSWORD'])) {
            $_SESSION['user_id'] = $user['id'];

            header("Location: /Task_Manger/dashboard/index.php");
            exit();
        } else {
            echo "wrong password";
        }

    } else {
        echo "user not found";
    }
}
?>

<form method="POST" action="login.php">
    <h2>Login</h2>

    <input type="email" name="email" placeholder="Email" required><br><br>

    <input type="password" name="password" placeholder="Password" required><br><br>

    <button type="submit" name="login">Login</button>
</form>