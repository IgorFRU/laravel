$(document).ready(function() {
    
    $('#question').click(function(event) {
        //event.preventDefault();
        //var $form = $(this);
        var phone = $('#question_phone').val();
        var name = $('#question_name').val();
        var question = $('#question_question').val();
        //console.log(phone);
        $.ajax({
            type: 'get',
            url: '/send-question',
            //data: $form.serialize()
            data: {
                phone: phone,
                name: name,
                question: question
            },
            // headers: {
            //     'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            // },
            success: function(data) {
                // $('#addArticle').modal('hide');
                // $('#articles-wrap').removeClass('hidden').addClass('show');
                // $('.alert').removeClass('show').addClass('hidden');
                // var str = '<tr><td>' + data['id'] +
                //     '</td><td><a href="/article/' + data['id'] + '">' + data['title'] + '</a>' +
                //     '</td><td><a href="/article/' + data['id'] + '" class="delete" data-delete="' + data['id'] + '">Удалить</a></td></tr>';

                //$('.table > tbody:last').append(str);
                $('.modal_send_question').removeClass("active");$('.modal_send_question').removeClass("active");
            },
            error: function(msg) {
                alert('Ошибка');
            }
        });
        return false;
    });

    $('#modal_oneclick_btn').click(function(event) {
        var name = $('#modal_oneclick_name').val();
        var phone = $('#modal_oneclick_phone').val();
        var quantity = $('#modal_oneclick_quantity').val();
        var price = $('#modal_oneclick_price').val();
        var product = $('#modal_oneclick_product').val();
        
        $.ajax({
            type: 'get',
            url: '/oneclick-purcache',
            data: {
                phone: phone,
                name: name,
                quantity: quantity,
                price: price,
                product: product,
            },
            success: function(data) {
                $('.modal_oneclick').removeClass('active');
            },
            error: function(msg) {
                alert('Ошибка');
            }
        });
        return false;
    });
});