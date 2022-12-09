<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "art_gallery");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
