<link rel="stylesheet" href="../assets/style.css">
<?php
session_start();
include("../config/db.php");
 include("../includes/navbar.php");

if (isset($_POST['login'])) {

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {

        $user = $result->fetch_assoc();
   

        if (password_verify($password, $user['PASSWORD'])) {
            $_SESSION['user_id'] = $user['id'];
          $_SESSION["username"] = $user["Name"] ?? $user["name"] ?? "";
          echo "Username: " . $_SESSION["username"];
            header("Location: ../dashboard/index.php");
            exit();
        } else {
            echo "wrong password";
        }

    } else {
        echo "user not found";
    }
}
?>
<div class="container">
<form method="POST" action="login.php">
    <h2>Login</h2>

    <input type="email" name="email" placeholder="Email" required><br><br>

    <input type="password" name="password" placeholder="Password" required><br><br>

    <button type="submit" name="login">Login</button>
</form>
</div>