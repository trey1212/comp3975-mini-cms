<?php
require_once '../db_connect.php';

header("Content-Type: application/json");

$result = $conn->query("SELECT id, title, content, created_at FROM articles ORDER BY created_at DESC");

$articles = [];

while ($row = $result->fetch_assoc()) {
    $articles[] = $row;
}

echo json_encode($articles);
