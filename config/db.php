<?php

$conn= new mysqli("127.0.0.1", "root", "", "taskmanger", 3307);
if($conn->connect_error){
die("connection failed ". $conn->connect_error);
}
?>