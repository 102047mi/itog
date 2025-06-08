<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

include '../config.php';

$id = intval($_GET['id']);
$sql = "DELETE FROM posts WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: ../index.php");
} else {
    echo "Ошибка: " . $conn->error;
}

$conn->close();
