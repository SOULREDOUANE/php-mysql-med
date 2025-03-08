<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/Database.php';

$db = new Database();
$conn = $db->getConnection();

$stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
$stmt->execute([
    'name' => 'John Doe',
    'email' => 'john@example.com'
]);

echo "User seeded successfully";
