<?php

$host = getenv("DB_HOST");
$port = (int) getenv("DB_PORT");
$user = getenv("DB_USER");
$password = getenv("DB_PASSWORD");
$database = getenv("DB_NAME");

$conn = mysqli_init();

mysqli_ssl_set(
    $conn,
    null,
    null,
   __DIR__ . "/../ca.pem",
    null,
    null
);

if (!mysqli_real_connect(
    $conn,
    $host,
    $user,
    $password,
    $database,
    $port,
    null,
    MYSQLI_CLIENT_SSL
)) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>