<?php
$conn = new mysqli("localhost", "root", "", "insydeyr_luxe");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>