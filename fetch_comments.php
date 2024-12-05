<?php
require 'db.php';  // Подключаем файл с настройками базы данных

// Получаем все комментарии из базы данных, сортируем по дате
$stmt = $pdo->query("SELECT * FROM comments ORDER BY created_at DESC");

// Проверяем, есть ли комментарии в базе данных
if ($stmt->rowCount() > 0) {
    // Если комментарии есть, выводим их
    while ($row = $stmt->fetch()) {
        echo "<div class='comment'>";
        echo "<strong>" . htmlspecialchars($row['username']) . "</strong><br>";
        echo "<p>" . nl2br(htmlspecialchars($row['comment'])) . "</p>";
        echo "<small>Дата: " . $row['created_at'] . "</small>";
        echo "</div><hr>";
    }
} else {
    echo "<p>Комментариев пока нет.</p>";
}
?>
