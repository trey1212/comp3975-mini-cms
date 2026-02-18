<?php
session_start();
require_once 'db_connect.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$result = $conn->query("SELECT * FROM articles ORDER BY created_at DESC");
$articles = $result->fetch_all(MYSQLI_ASSOC);
?>


<h2>Admin Dashboard</h2>
<a href="create.php">Create New Article</a> |
<a href="logout.php">Logout</a>

<table border="1">
    <tr>
        <th>Title</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($articles as $article): ?>
        <tr>
            <td><?= htmlspecialchars($article['title']) ?></td>
            <td>
                <a href="edit.php?id=<?= $article['id'] ?>">Edit</a>
                <a href="delete.php?id=<?= $article['id'] ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>