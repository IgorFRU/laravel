$(document).ready(function() {
    var oldScroll = 0;
    var clickToSmall = false;
    var marginMainMenu = $('.mainmenu').css('margin-top');
    var marginFirstSection = $('#firstsection').css('padding-top');

    $('.fastmenu__tosmall').click(function() {
        if ($('.fastmenu').hasClass('active')) {
            clickToSmall = false;
            $('.mainmenu').css('margin-top', marginMainMenu);
            $('#firstsection').css('padding-top', marginFirstSection);
        } else {
            clickToSmall = true;
            $('.mainmenu').css('margin-top', '45px');
            $('#firstsection').css('padding-top', '89px');
        }
        $('.fastmenu').toggleClass('active');
        $('.fastmenu__tosmall').toggleClass('active');
        $('.fastmenu__tosmall > span').toggleClass('active');
        $('.fastmenu').children().toggleClass('hide');
        //$('.logo').toggleClass('hide');	

    });

    $(window).scroll(function() {
        if ($(window).scrollTop() > 100) {
            $('.mainmenu__burger').addClass('active');
        } else {
            $('.mainmenu__burger').removeClass('active');
        }
        if (!clickToSmall) {
            if ($(window).scrollTop() > oldScroll + 50) {
                oldScroll = $(window).scrollTop();
                $('.fastmenu').addClass('active');
                $('.fastmenu__tosmall > span').addClass('active');
                $('.fastmenu__tosmall').addClass('active');
                //$('.logo').addClass('hide');
                $('.fastmenu').children().addClass('hide');
            };

            if (($(window).scrollTop() < oldScroll - 300) || ($(window).scrollTop() < 100)) {
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

    // var prices = document.querySelectorAll('.products__card__price__new > div > span.value');

    // for (let i = 0; i < prices.length; i++) {
    //     if (prices[i].innerText % 1 == 0) {
    //         prices[i].innerText = parseInt(prices[i].innerText);
    //     }
    // }

    var salePackage = document.querySelectorAll('.products__card__price__new__package > div');

    //На карточках товаров при клике по кнопке "за 1 м.кв.", "за 1 уп" цена На продукт отображается соответствующая
    salePackage.forEach(function(btn, i) {
        btn.addEventListener('click', () => {
            const oldPrice = btn.parentNode.children;
            const showPriceValue = btn.parentNode.parentNode.querySelector('div > span.value');

            for (let i = 0; i < oldPrice.length; i++) {
                oldPrice[i].classList.remove('active');
            }
            showPriceValue.innerText = btn.dataset.price;
            btn.classList.add('active');

        });
    });

    var salePackage2 = document.querySelectorAll('.products__card__price__new__package');
    salePackage2.forEach(function(btn, i) {
        if (btn.querySelectorAll('div').length < 2) {
            btn.parentNode.parentNode.parentNode.querySelector('.products__card__buttons').remove();
        }
    });

    // var priceInInput = document.querySelectorAll('.products__card__buttons__input > input');
    // console.log(priceInInput);
    // priceInInput.forEach(function(input, i) {
    //     //input.value = 555;
    // });

    var pricePlus = document.querySelectorAll('.products__card__buttons__input > span.plus');
    pricePlus.forEach(function(plus, i) {
        const countInInput = plus.parentNode.parentNode.querySelector('.products__card__buttons__input > input');
        const forPayment = plus.parentNode.parentNode.querySelector('.for_payment > span');
        plus.addEventListener('click', () => {
            let count = countInInput.dataset.countpackage;
            count++;
            countInInput.value = Math.round(countInInput.dataset.count * count * 100) / 100 + ' м.кв.';
            countInInput.dataset.countpackage = count;
            forPayment.innerText = (Math.round(count * countInInput.dataset.price * 100) / 100).toLocaleString('ru');

        });
    });

    var priceMinus = document.querySelectorAll('.products__card__buttons__input > span.minus');
    priceMinus.forEach(function(minus, i) {
        const countInInput = minus.parentNode.querySelector('.products__card__buttons__input > input');
        const forPayment = minus.parentNode.parentNode.querySelector('.for_payment > span');
        minus.addEventListener('click', () => {
            let count = countInInput.dataset.countpackage;
            if (count > 1) {
                count--;
                countInInput.dataset.countpackage = count;
                countInInput.value = Math.round(countInInput.dataset.count * count * 100) / 100 + ' м.кв.';
                forPayment.innerText = (Math.round(count * countInInput.dataset.price * 100) / 100).toLocaleString('ru');
            }
        });
    });

    var one_click = document.querySelectorAll('.one_click');
    one_click.forEach(function(click, i) {
        click.addEventListener('click', () => {
            const quantity = click.parentNode.parentNode.querySelector('.products__card__buttons__input > input').value;
            const price = click.parentNode.parentNode.querySelector('.for_payment > span').innerText;
            var product = click.parentNode.parentNode.parentNode.querySelector('.products__card__info > .products__card__maininfo > .products__card__title > h3 > a');
            if (!product) {
                product = document.URL;
            }
            $('#modal_oneclick_quantity').val(quantity);
            $('#modal_oneclick_price').val(price + " руб.");

            $('#modal_oneclick_product').val(product);

            $('.modal_oneclick').addClass('active');
        });

    });

    $('.help_btn').click(function() {
        $('.modal_send_question').addClass("active");
    });

    $('.modal_oneclick__header__close').click(function() {
        $('.modal_oneclick').removeClass("active");
    });
    $('.modal_send_question__header__close').click(function() {
        $('.modal_send_question').removeClass("active");
    });

    //-----------------
    //Управление миниатюрами и главным изображением в карточке товара на фронет
    var mainProductImage = document.querySelector('.main_product_image > img');
    var otherProductImagesContainer = document.querySelector('.images__container > .column');
    var otherProductImages = document.querySelectorAll('.images__container__item > img');
    var otherProductImagesSize = otherProductImages.length;
    
    var otherProductImageUp = document.querySelector('.images__container span.up');
    var otherProductImageDown = document.querySelector('.images__container span.down');
    
    otherProductImages.forEach(function(img, i) {        
        img.addEventListener('click', () => {
            const mainThumbnail = img.parentNode.parentNode.querySelector('.main');
            mainThumbnail.classList.remove('main');
            img.classList.add('main');
            mainProductImage.setAttribute('src', img.getAttribute('src'));
        });      
    });

    var otherProductImagesPosition = 0;
    var step = 0;
    otherProductImageDown.addEventListener('click', () => {
        otherProductImagesPosition-=75;
        step++;
        otherProductImagesContainer.style.top =otherProductImagesPosition+'px';
        otherProductImageUp.style.display = 'block';
        if (otherProductImagesSize - step == 4){
            otherProductImageDown.style.display = 'none';
        }
    });
    otherProductImageUp.addEventListener('click', () => {
        otherProductImagesPosition+=75;
        step--;
        otherProductImagesContainer.style.top = otherProductImagesPosition+'px';
        otherProductImageDown.style.display = 'block';
        if (step == 0){
            otherProductImageUp.style.display = 'none';
        }
    });   
    //Конец
    //-----------------------------------------  
});