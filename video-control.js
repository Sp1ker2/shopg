// Получаем видео
const video = document.querySelector('.thumbnail-video');

// Добавляем обработчик события "click"
video.addEventListener('click', () => {
    if (video.paused) {
        video.play(); // Начать воспроизведение
    } else {
        video.pause(); // Поставить на паузу
    }
});
