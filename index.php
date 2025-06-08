<?php
include 'config.php';

$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Простейший блог</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Список постов</h1>
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="post">
            <h2><?php echo htmlspecialchars($row['title']); ?></h2>
            <p><?php echo htmlspecialchars(substr($row['content'], 0, 100)); ?>...</p>
            <p><small>Дата публикации: <?php echo $row['created_at']; ?></small></p>
            <a href="post.php?id=<?php echo $row['id']; ?>">Читать далее</a>
        </div>
    <?php endwhile; ?>
</body>

</html>

<?php
$conn->close();
?>