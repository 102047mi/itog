<?php
include 'config.php';

$id = intval($_GET['id']);
$sql = "SELECT * FROM posts WHERE id = $id";
$result = $conn->query($sql);
$post = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($post['title']); ?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1><?php echo htmlspecialchars($post['title']); ?></h1>
    <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
    <p><small>Дата публикации: <?php echo $post['created_at']; ?></small></p>
    <a href="index.php">Назад к списку</a>
</body>

</html>

<?php
$conn->close();
?>