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

// Проверка данных из формы
$product_id = $_POST['product_id'];
$user_name = $_POST['user_name'];
$rating = $_POST['rating'];
$comment = $_POST['comment'];

if (!empty($user_name) && !empty($rating) && !empty($comment)) {
    $stmt = $conn->prepare("INSERT INTO reviews (product_id, user_name, rating, comment, review_date) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("isis", $product_id, $user_name, $rating, $comment);

    if ($stmt->execute()) {
        header("Location: {$_SERVER['HTTP_REFERER']}"); // Перенаправление обратно на страницу
    } else {
        echo "Ошибка: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Все поля должны быть заполнены!";
}

$conn->close();
?>
