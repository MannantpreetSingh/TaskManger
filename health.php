<?php

include("config/db.php");

$result = $conn->query("SELECT 1");

if ($result) {
    http_response_code(200);
    echo "OK";
} else {
    http_response_code(500);
    echo "DB ERROR";
}