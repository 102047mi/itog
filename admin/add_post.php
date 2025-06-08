<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $content = $conn->real_escape_string($_POST['content']);

    $sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Ошибка: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить пост</title>
</head>

<body>
    <h1>Добавить новый пост</h1>
    <form method="POST">
        <input type="text" name="title" placeholder="Заголовок" required>
        <textarea name="content" placeholder="Текст статьи" required></textarea>
        <button type="submit">Опубликовать</button>
    </form>
    <a href="login.php">Назад к входу</a>
</body>

</html>

<?php
$conn->close();
?>