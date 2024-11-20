<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $comment = htmlspecialchars($_POST['comment']);

    // Текущее время + 2 часа
    $date = date('Y-m-d H:i:s', strtotime('+2 hours'));
    $file = 'comments.txt';

    // Добавляем строку с датой, именем и комментарием
    $line = $date . " | " . $name . ": " . $comment . "\n";
    file_put_contents($file, $line, FILE_APPEND);

    // Возвращаем HTML для нового комментария
    echo "<div class='comment'>
            <div class='comment-date'>$date</div>
            <div class='comment-name'>" . htmlspecialchars($name) . "</div>
            <div class='comment-text'>" . htmlspecialchars($comment) . "</div>
          </div>";
}
?>
