<?php 
$conn = mysqli_connect('localhost:3307', 'root', '', 'sdb');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>