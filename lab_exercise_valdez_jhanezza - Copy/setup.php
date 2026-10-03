CREATE DATABASE game_library;
USE game_library;

CREATE TABLE games (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    genre VARCHAR(50) NOT NULL,
    platform VARCHAR(50) NOT NULL,
    release_year INT(4) NOT NULL
);
db.php

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "game_library";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>