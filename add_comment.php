<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из формы
    $username = htmlspecialchars($_POST['username']);
    $comment = htmlspecialchars($_POST['comment']);

    if (!empty($username) && !empty($comment)) {
        // Вставляем данные в таблицу
        $stmt = $pdo->prepare("INSERT INTO comments (username, comment, created_at) VALUES (:username, :comment, NOW())");
        $stmt->execute(['username' => $username, 'comment' => $comment]);
        echo "Комментарий добавлен успешно!";
    }
}
?>
