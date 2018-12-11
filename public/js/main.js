//$(document).ready(function() {
	var oldScroll = 0;
	var clickToSmall = false;
	var marginMainMenu = $('.mainmenu').css('margin-top');

	$('.fastmenu__tosmall').click(function() {
		if ($('.fastmenu').hasClass('active')) {
			clickToSmall = false;
			$('.mainmenu').css('margin-top', marginMainMenu);
		} else {
			clickToSmall = true;
			$('.mainmenu').css('margin-top', '45px');
		}
		$('.fastmenu').toggleClass('active');
		$('.fastmenu__tosmall').toggleClass('active');
		$('.fastmenu__tosmall > span').toggleClass('active');
		$('.fastmenu').children().toggleClass('hide');
		//$('.logo').toggleClass('hide');	
        
	});

	
	$(window).scroll(function() {
		if($(window).scrollTop() > 100) {
			$('.mainmenu__burger').addClass('active');
		}
		else {
			$('.mainmenu__burger').removeClass('active');
		}
		if (!clickToSmall) {
			if($(window).scrollTop() > oldScroll + 50) {
				oldScroll = $(window).scrollTop();
				$('.fastmenu').addClass('active');		
				$('.fastmenu__tosmall > span').addClass('active');
                $('.fastmenu__tosmall').addClass('active');
				//$('.logo').addClass('hide');
                $('.fastmenu').children().addClass('hide');
			};

			if(($(window).scrollTop() < oldScroll - 300) || ($(window).scrollTop() < 100)) {
				oldScroll = $(window).scrollTop();
				$('.fastmenu').removeClass('active');
				$('.fastmenu__tosmall > span').removeClass('active');
                $('.fastmenu__tosmall').removeClass('active');
				//$('.logo').removeClass('hide');
                $('.fastmenu').children().removeClass('hide');
			}
		}	
	});

if (($('.fastmenu__body__right__shopping_cart > span').html() == '') || ($('.fastmenu__body__right__shopping_cart > span').html() == 0)) {
    $('.fastmenu__body__right__shopping_cart > span').hide();
}

$('.fastmenu__body__right__search > i').click(function() {
    let search = $('.fastmenu__body__right__search > .search__form');
    search.toggleClass('active');
    
//    if (search.hasClass('active')) {
//        $('.fastmenu__body__tel').css('opacity', '0.5');
//    }
    
    
});

//});