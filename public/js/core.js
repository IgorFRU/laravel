//Появление и исчезновение всплывающего окна о том, что что-то (категория, товар, пр.) удалено
setTimeout(function () {
    $('.alert-success').fadeIn(500, function () {
        setTimeout(function () {
            $('.alert-success').fadeOut(500)
        }, 4000);
    })
}, 500);




$('.category__title').hover(
    function () {
        let $block_width = $(this).width();
        let $text_width = $(this).find('span:first-child').width();

        if ($block_width < $text_width) {
            $(this).find('.tooltip').fadeIn(100);
        }
    },
    function () {
        $(this).find('.tooltip').fadeOut(100);
    }
);

$('.ajax_test').click(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
    method: 'POST',
    url: './manufacture',
    dataType: 'json',
    data: {
        sort_by: 'manufacture',
        sort_type: 'DESC'
     },
    success:function(response) {
       console.log(response);
    },
    error: function (data, textStatus, errorThrown) {
        console.log(data);

    },
})
});
