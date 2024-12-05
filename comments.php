<?php
$servername = "localhost"; // Адрес сервера
$username = "root"; // Имя пользователя MySQL
$password = "bs"; // Пароль для MySQL
$dbname = "comments_db"; // Название базы данных

// Создаем подключение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем подключение
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Если форма отправлена, добавляем комментарий в базу данных
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $comment = $_POST['comment'];

    $stmt = $conn->prepare("INSERT INTO comments (comment, username, created_at) VALUES (?, ?, NOW())");
    $stmt->bind_param("ss", $comment, $user);
    $stmt->execute();
    $stmt->close();
}

// Получаем и отображаем все комментарии
$sql = "SELECT * FROM comments ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div><strong>" . htmlspecialchars($row['username']) . ":</strong> " . htmlspecialchars($row['comment']) . "<br><em>" . $row['created_at'] . "</em></div><hr>";
    }
} else {
    echo "Нет комментариев.";
}

$conn->close();
?>
