<?php
// Загрузка комментариев
$file = 'comments.txt';
$comments = [];

if (file_exists($file)) {
    $comments = file($file, FILE_IGNORE_NEW_LINES);
}

// Передача комментариев в отдельный HTML-шаблон
include 'index.html';
?>
