<?php
// Database connection parameters
$host = 'localhost';
$username = 'root';  // Change this to your MySQL username
$password = '';      // Change this to your MySQL password

// Create connection
$conn = new mysqli($host, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql_create_db = "CREATE DATABASE IF NOT EXISTS buku_tamu";
if ($conn->query($sql_create_db) === TRUE) {
    echo "Database buku_tamu created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

// Select the database
$conn->select_db('buku_tamu');

// Create keperluan table
$sql_create_keperluan = "CREATE TABLE IF NOT EXISTS keperluan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    deskripsi VARCHAR(255) NOT NULL
)";

// Create tamu table
$sql_create_tamu = "CREATE TABLE IF NOT EXISTS tamu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    pesan TEXT,
    keperluan_id INT,
    FOREIGN KEY (keperluan_id) REFERENCES keperluan(id)
)";

// Execute table creation queries
if ($conn->query($sql_create_keperluan) === TRUE) {
    echo "Table keperluan created successfully<br>";
} else {
    echo "Error creating keperluan table: " . $conn->error . "<br>";
}

if ($conn->query($sql_create_tamu) === TRUE) {
    echo "Table tamu created successfully<br>";
} else {
    echo "Error creating tamu table: " . $conn->error . "<br>";
}

$conn->close();
?>
