<?php
$file = 'comments.txt';

if (file_exists($file)) {
    $comments = array_reverse(file($file)); // Последние комментарии сверху

    foreach ($comments as $comment) {
        // Проверяем, есть ли разделитель " | " в строке
        if (strpos($comment, ' | ') === false) {
            continue; // Пропускаем строку, если формат неправильный
        }

        list($date, $rest) = explode(" | ", $comment, 2);

        // Проверяем, есть ли разделитель ":" в оставшейся части строки
        if (strpos($rest, ':') === false) {
            continue; // Пропускаем строку, если нет имени и текста
        }

        list($name, $text) = explode(":", $rest, 2);

        // Выводим только строки с корректными данными
        echo "<div class='comment'>
                <div class='comment-date'>" . htmlspecialchars(trim($date)) . "</div>
                <div class='comment-name'>" . htmlspecialchars(trim($name)) . "</div>
                <div class='comment-text'>" . htmlspecialchars(trim($text)) . "</div>
              </div>";
    }
}
?>
