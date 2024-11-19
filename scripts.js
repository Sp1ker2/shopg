$(document).ready(function () {
    $('#comment-form').on('submit', function (e) {
        e.preventDefault();

        const name = $('#name').val();
        const comment = $('#comment').val();

        $.post('submit_comment.php', { name: name, comment: comment }, function (response) {
            $('#comments-section').prepend(response); // Добавляем комментарий в начало
            $('#name').val('');
            $('#comment').val('');
        });
    });
});
