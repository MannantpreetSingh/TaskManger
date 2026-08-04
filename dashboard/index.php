<?php
session_start();
if(!isset($_SESSION[""])){
    header("location : /auth/login.php" );
    exit();
}
echo "Welcome to Dashboard";

?>