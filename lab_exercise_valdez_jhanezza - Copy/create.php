<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $genre = $conn->real_escape_string($_POST['genre']);
    $platform = $conn->real_escape_string($_POST['platform']);
    $release_year = (int)$_POST['release_year'];

    $sql = "INSERT INTO games (title, genre, platform, release_year) VALUES ('$title', '$genre', '$platform', '$release_year')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <title>Add Game</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 600px;">
    <h2>Add Game to Library</h2>
    <form method="POST" action="" class="card p-4 mt-3 shadow">
        <div class="mb-3">
            <label class="form-label">Game Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Genre</label>
            <input type="text" name="genre" class="form-control" placeholder="e.g. RPG, Shooter" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Platform</label>
            <input type="text" name="platform" class="form-control" placeholder="e.g. PC, PS5, Switch" required>
        </div>
        <div class="mb-4">
            <label class="form-label">Release Year</label>
            <input type="number" name="release_year" class="form-control" required>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Save Game</button>
            <a href="index.php" class="btn btn-outline-light ms-2">Cancel</a>
        </div>
    </form>
</div>
</body>
</html>