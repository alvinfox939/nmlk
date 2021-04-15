(function ($){
    $(document).ready(function(){

        $(".fancybox").fancybox({
            tpl:{
                closeBtn : '<a class="fancybox-item fancybox-close"></a>',
            },
            padding: 0,
        });

        //слайдер на главной
        var mainpageSlider = $(".mainpage-slider-container .slider").slick({
            arrows: false,
            fade: true,
            autoplay: true,
            autoplaySpeed: 5000,
			asNavFor: '.mainpage-slider-container .navigation'
        });
		$(".mainpage-slider-container .navigation").slick({
			asNavFor: mainpageSlider,
			slidesToShow: 5,
			arrows: false,
			vertical: true,
			centerMode: true,
			focusOnSelect: true
		});

        //поиск на главной
        $(".front .search > .wrapper").click(function(){
            var searchBlock = $(".mainpage-search-form");
            searchBlock.show();
            setTimeout(function(){
                searchBlock.addClass("active");
            }, 100);
            searchBlock.find(".search-block input").focus();
            $(document).mouseup(function (e){
                if(!searchBlock.is(e.target) && searchBlock.has(e.target).length === 0){
                    searchBlock.hide().removeClass("active");
                    searchBlock.find(".search-block input").val("");
                }
            });
        });

        //слайдер услуг
        var serviceSlider = $(".services-page .slider").slick({
            slidesToShow: 1,
            infinite: true,
            centerMode: true,
            prevArrow: '<button type="button" class="slick-button slick-prev"></button>',
            nextArrow: '<button type="button" class="slick-button slick-next"></button>',
            fade: true,
        });
        serviceSlider.css({opacity: 1});
        $(".services-page .nav .item").click(function(){
            if(!$(this).hasClass("slick-current")){
                serviceSlider.slick('slickGoTo', $(this).data("slick-index"));
                $(".services-page .nav .item").removeClass("slick-current");
                $(this).addClass("slick-current");
            }
        });
        serviceSlider.on('afterChange', function(slick, currentSlide){
            $(".services-page .nav .item").removeClass("slick-current");
            $(".services-page .nav .item[data-slick-index="+currentSlide.currentSlide+"]").addClass("slick-current");
        });
		
		//куки и открытка
		function get_cookie ( cookie_name ){
			var results = document.cookie.match ( '(^|;) ?' + cookie_name + '=([^;]*)(;|$)' ); 
			if ( results )
				return ( unescape ( results[2] ) );
			else
				return null;
		}
		function set_cookie ( name, value, exp_y, exp_m, exp_d, path, domain, secure ){
			var cookie_string = name + "=" + escape ( value ); 
			if ( exp_y ) {
				var expires = new Date ( exp_y, exp_m, exp_d );
				cookie_string += "; expires=" + expires.toGMTString();
			} 
			if ( path )
				cookie_string += "; path=" + escape ( path ); 
			if ( domain )
				cookie_string += "; domain=" + escape ( domain );  
			if ( secure )
				cookie_string += "; secure";  
			document.cookie = cookie_string;
		}
		
		var x = get_cookie ( "ny_card" );
		if(!x){
			$(".ny_card").addClass("slide-in");
			set_cookie ( "ny_card", "true" );
		}
		
		$(".ny_card .close").click(function(){
			$(".ny_card").removeClass("slide-in");
		});

        // up-btn
        $(window).scroll(function () {
            if ($(this).scrollTop() !== 0) {
                $('.up-btn').fadeIn()
            } else {
                $('.up-btn').fadeOut()
            }
        });
        
        $('.up-btn').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 800)
        });

        // magnific popup
        var mfpImage = $('.js-mfp-image');

        if (mfpImage.length > 0) {
            try {
                mfpImage.magnificPopup({
                    type: 'image',
                    tLoading: 'Загрузка изображения #%curr%...',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                    },
                    image: {
                        tError: '<a href="%url%">Изображение #%curr%</a> не может быть загружено.'
                    }
                });
            } catch (e) {
                console.log(e);
            }
        }
    });
})(jQuery);