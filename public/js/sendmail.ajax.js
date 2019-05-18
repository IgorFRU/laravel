$(document).ready(function() {
    $(function() {
        $('#send_question').on('click', function(event) {
            event.preventDefault();
            var phone = $('#question_phone').val();
            var phone = $('#question_name').val();
            var phone = $('#question_question').val();
            $.ajax({
                url: 'send-question',
                type: "POST",
                data: {
                    phone: phone,
                    name: name,
                    question: question
                },
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    // $('#addArticle').modal('hide');
                    // $('#articles-wrap').removeClass('hidden').addClass('show');
                    // $('.alert').removeClass('show').addClass('hidden');
                    // var str = '<tr><td>' + data['id'] +
                    //     '</td><td><a href="/article/' + data['id'] + '">' + data['title'] + '</a>' +
                    //     '</td><td><a href="/article/' + data['id'] + '" class="delete" data-delete="' + data['id'] + '">Удалить</a></td></tr>';

                    //$('.table > tbody:last').append(str);
                },
                error: function(msg) {
                    alert('Ошибка');
                }
            });
            return false;
        });
    });
});