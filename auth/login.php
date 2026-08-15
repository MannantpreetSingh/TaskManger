<?php

session_start();

include("../config/db.php");

if (isset($_POST['login'])) {

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

   $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {

        $user = $result->fetch_assoc();

        if (password_verify($password, $user['PASSWORD'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['Name'] ?? $user['name'] ?? '';

            // Redirect without printing anything first
            header("Location: ../dashboard/index.php");
            exit();

        } else {

            echo "Wrong password";

        }

    } else {

        echo "User not found";

    }
}
?>

<link rel="stylesheet" href="../assets/style.css">

<div class="container">

    <form method="POST" action="login.php">

        <h2>Login</h2>

        <input type="email" name="email" placeholder="Email" required>

        <br><br>

        <input type="password" name="password" placeholder="Password" required>

        <br><br>

        <button type="submit" name="login">
            Login
        </button>

    </form>

</div>