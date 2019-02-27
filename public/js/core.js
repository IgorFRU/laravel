//Появление и исчезновение всплывающего окна о том, что что-то (категория, товар, пр.) удалено
setTimeout(function() {
    $('.alert-success').fadeIn(500, function() {
        setTimeout(function() {
            $('.alert-success').fadeOut(500)
        }, 4000);
    })
}, 500);




$('.category__title').hover(
    function() {
        let $block_width = $(this).width();
        let $text_width = $(this).find('span:first-child').width();

        if ($block_width < $text_width) {
            $(this).find('.tooltip').fadeIn(100);
        }
    },
    function() {
        $(this).find('.tooltip').fadeOut(100);
    }
);



const js_oneclick = document.querySelectorAll('.js_oneclick');

// Скрытое поле, отправляющее Value = 0, если чекбокс не отмечен
const js_oneclick_hidden = document.querySelectorAll('.js_oneclick_hidden');

// Функция, в одно касание меняющая value в чекбоксах
js_oneclick.forEach(function(checbox, i){
    checbox.addEventListener('click', () => {
        checbox.value = +checbox.checked;
        js_oneclick_hidden[i].value = checbox.value;
    });
});


$('.ajax_test').click(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        method: 'POST',
        url: '/admin/manufacture',
        dataType: 'json',
        data: {
            sort_by: 'manufacture',
            sort_type: 'DESC'
        },
        success: function(response) {
            //console.log(response);
        },
        error: function(data, textStatus, errorThrown) {
            console.log(data);

        },
    })
});