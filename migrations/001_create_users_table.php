<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/Database.php';

$db = new Database();
$conn = $db->getConnection();

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$conn->exec($sql);
echo "Table created successfully";
