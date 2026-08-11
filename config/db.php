<?php

$host = getenv("DB_HOST");
$port = getenv("DB_PORT");
$user = getenv("DB_USER");
$password = getenv("DB_PASSWORD");
$database = getenv("DB_NAME");
$conn = mysqli_init();
mysqli_ssl_set(
    $conn,
    null,
    null,
    "/etc/secrets/ca.pem",
    null,
    null
);
mysqli_real_connect(
    $conn,
    $host,
    $user,
    $password,
    $database,
    $port,
    null,
    MYSQLI_CLIENT_SSL
);
if (!$conn) {
    die("connection failed " . mysqli_connect_error());
    
}
?>