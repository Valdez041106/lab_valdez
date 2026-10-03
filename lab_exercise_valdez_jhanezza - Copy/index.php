<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <title>Game Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4 text-primary">🎮 My Game Library</h1>
    <a href="create.php" class="btn btn-success mb-3">+ Add New Game</a>
    
    <table class="table table-hover table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Title</th>
                <th>Genre</th>
                <th>Platform</th>
                <th>Release Year</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM games ORDER BY id DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td><strong>{$row['title']}</strong></td>
                            <td>{$row['genre']}</td>
                            <td><span class='badge bg-secondary'>{$row['platform']}</span></td>
                            <td>{$row['release_year']}</td>
                            <td>
                                <a href='edit.php?id={$row['id']}' class='btn btn-sm btn-warning'>Edit</a>
                                <a href='delete.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Delete this game?\")'>Delete</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>No games in your library yet.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>