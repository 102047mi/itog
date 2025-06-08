<?php
$host = "localhost";
$user = "root"; // Замените на ваше имя пользователя MySQL
$password = ""; // Замените на ваш пароль MySQL
$dbname = "blog";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
