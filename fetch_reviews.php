<?php
$host = 'localhost';
$dbname = 'comments_db';
$username = 'root';
$password = 'bs';

// Подключение к базе данных
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Получение отзывов
$sql = "SELECT * FROM reviews WHERE product_id = 1 ORDER BY review_date DESC";
$result = $conn->query($sql);

// Вывод отзывов в формате HTML
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='review'>";
        echo "<div class='stars'>" . str_repeat("★", $row['rating']) . str_repeat("☆", 5 - $row['rating']) . "</div>";
        echo "<p class='review-text'>" . htmlspecialchars($row['comment']) . "</p>";
        echo "<p class='review-author'>– " . htmlspecialchars($row['user_name']) . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>Поки що відгуків немає.</p>";
}

$conn->close();
?>
