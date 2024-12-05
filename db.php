<?php
$host = 'localhost';     // Хост
$dbname = 'comments_db;';     // Имя базы данных
$username = 'root';      // Имя пользователя для подключения
$password = 'bs';          // Пароль (если он есть)

try {
    // Подключаемся к базе данных с использованием PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Ошибка подключения: ' . $e->getMessage();
    die();
}
?>
