<?php
session_start();
require_once 'db_connect.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $conn->prepare("INSERT INTO articles (title, content) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $content);
    $stmt->execute();
    $stmt->close();

    header("Location: dashboard.php");
    exit;
}
?>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea'
    });
</script>

<h2>Create Article</h2>

<form method="POST">
    <input type="text" name="title" placeholder="Title" required><br><br>
    <textarea name="content"></textarea><br><br>
    <button type="submit">Save</button>
</form>