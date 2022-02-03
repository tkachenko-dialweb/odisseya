$(function () {

	$(window).on('load', function () {
		document.body.classList.add('loaded_hiding');
		window.setTimeout(function () {
			document.body.classList.add('loaded');
			document.body.classList.remove('loaded_hiding');
		}, 300);
	});

	new WOW().init();

	$("#phone_contact_us, #phone").mask("+7(999) 999-99-99");

	$(".main_menu li a, .mnu li a, footer .menu li a").mPageScroll2id();

	$.datepicker.regional['ru'] = {
		closeText: 'Закрыть',
		prevText: 'Предыдущий',
		nextText: 'Следующий',
		currentText: 'Сегодня',
		monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
		monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
		dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
		dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
		dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
		weekHeader: 'Не',
		dateFormat: 'dd.mm.yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''
	};
	$.datepicker.setDefaults($.datepicker.regional['ru']);

	$(function(){
		$(".datepicker").datepicker({
			minDate: 0
		});
	});



	$('.select').on('click', '.select__head', function () {
		if ($(this).hasClass('open')) {
			$(this).removeClass('open');
			$(this).next().fadeOut();
		} else {
			$('.select__head').removeClass('open');
			$('.select__list').fadeOut();
			$(this).addClass('open');
			$(this).next().fadeIn();
		}
	});

	$('.select').on('click', '.select__item', function () {
		$('.select__head').removeClass('open');
		$('.select__item').removeClass('active');
		$(this).addClass('active');
		$(this).parent().fadeOut();
		$(this).parent().prev().children('.name').text($(this).text());
		$(this).parent().prev().prev().val($(this).attr('data-room'));
		$(this).parent().prev().prev().prev('.adults').val($(this).attr('data-adults'));
		$(this).parent().prev().prev('.children').val($(this).attr('data-children'));
	});

	$('.input_wrapper').on('click', '.btn_add_children', function () {
		$(this).fadeOut();
		$(this).nextAll(':lt(2)').fadeIn();
	});

	$(document).click(function (e) {
		if (!$(e.target).closest('.select').length) {
			$('.select__head').removeClass('open');
			$('.select__list').fadeOut();
		}
	});



	//Основное меню
	$(document).click(function (e) {
		if ($(e.target).closest('.main_menu .parent_item').length) {
			return;
		}
		// клик снаружи элемента
		$(".main_menu .parent_item .sub_menu").fadeOut(200);
		$(".main_menu .parent_item").removeClass("current");
	});
	$('.main_menu .parent_item').hover(function () {
		$(this).toggleClass("current");
		$('.main_menu .parent_item').not(this).removeClass('current');
		$('.main_menu .parent_item').not(this).children(".sub_menu").fadeOut(200);
		if ($(this).hasClass('current')) {
			$(this).children(".sub_menu").fadeIn(200);
		} else {
			$('.sub_menu').fadeOut(200);
			$('.main_menu .parent_item').removeClass("current");

		};

	});

	$(document).click(function (e) {
		if ($(e.target).closest('.header .navigation_menu .toggle_mnu, .mobile_menu .parent_item').length) {
			return;
		}
		// клик снаружи элемента
		$('.toggle_mnu').removeClass("active");
		$(".mobile_menu").fadeOut(400);
		$(".mobile_menu .parent_item .sub_menu").fadeOut(400);
		$(".mobile_menu .parent_item").removeClass("current").children('.sub_menu').slideUp();
	});

	$(".toggle_mnu").click(function () {
		$(this).toggleClass("active");
		$(".mobile_menu").toggleClass("active");
		if ($(".mobile_menu").is(":visible")) {
			$(".mobile_menu").slideUp();
			$('.mobile_menu .parent_item').removeClass('current').children('.sub_menu').slideUp();
		} else {
			$(".mobile_menu").slideDown();
		};
	});

	$('.mobile_menu .parent_item .arrow').click(function () {
		$(this).parent().toggleClass('current').children('.sub_menu').slideToggle();
		$('.mobile_menu .parent_item .arrow').not(this).parent().removeClass('current').children('.sub_menu').slideUp();
	});


	//// Горизонтальный скроллинг до нужного эелемента
	// var scrollArea = $('.head_room_order');
	// var toScroll = $('.head_room_order .name_room');
	// function scrollStuff() {
	// 	toScroll.each(function() {
	// 		var self = $(this);
	// 		$(this).css('cursor', 'pointer');
	// 		$(this).on('click', function () {
	// 			var leftOffset = self.offset().left - scrollArea.offset().left + scrollArea.scrollLeft() - 14;
	// 			scrollArea.animate({ scrollLeft: leftOffset });
	// 		});
	// 	});
	// };
	// scrollStuff();



	$( document).ready(function() {
		Fancybox.bind("[data-fancybox]", {
		});
	});

	$('.slider_room .slide:first').addClass('active');
	$('.slider_room .bg_image:first').fadeIn(400);
	$('.slider_room .slide').click(function () {
		$('.slider_room .bg_image').fadeOut(400);
		$(this).addClass('active').next().fadeIn(400);
		$('.slider_room .slide').not(this).removeClass('active');
	});

	$('.events .button_phone_order').click(function() {
		var title = $(this).parent('.item').children('.head').children().html();
		$('.events .title_event').val(title);
	});

	$('.accommodation .big_slide .nav_buttons').on('click', '.btn', function () {
		$('.mySwiper_thumbs .thumbs .swiper-slide').css({'transition':'.4s'});
	});



	//// Реализация свайпа для самописных слайдеров
	$(".tab_content .tab_item").swipe( {
		swipeLeft:nextSlide,
		swipeRight:prevSlide,
		threshold:0
	});
	$(".mySwiper .swiper-wrapper").swipe( {
		swipeLeft:nextSwiper,
		swipeRight:prevSwiper,
		threshold:0
	});

	function nextSwiper() {
		$('.slide_next').trigger('click');
	}
	function prevSwiper() {
		$('.slide_prev').trigger('click');
	}





	///////// СЛАЙДЕР УСЛУГИ
	$(".services_wrapper .slide").not(":first").hide();
	$(".services_wrapper .slide:first").addClass("active");
	$(".services_wrapper .slide .tab_item:first").addClass("active").removeClass("left_hidden");

	var slideNow = 1;
	var galleryIndex = 0;

	$(".services_wrapper .tab").click(function() {
		slideNow = 1;
		$(".services_wrapper .tab").removeClass("active").eq($(this).index()).addClass("active");
		$(".services_wrapper .slide").hide().removeClass("active").eq($(this).index()).fadeIn().addClass("active");
		$(".services_wrapper .slide").children().removeClass("active").css("z-index", "auto");
		$(".services_wrapper .slide").eq($(this).index()).children(':first').addClass("active").removeClass("left_hidden").css("z-index", "1");
		
		if($('.services_wrapper .tab.active').hasClass('none_title')) {
			// $('.title_active_slide .name').html('');
			$('.nav_buttons').css("display", "none");
			// $('.title_active_slide').removeClass('children');
		// } else if ($('.services_wrapper .tab.active').hasClass('children')) {
		// 	var title = $('.services_wrapper .tab.active').html();
		// 	$('.title_active_slide .name').html(title);
		// 	$('.title_active_slide').addClass('children');
		} else {
			// var title = $('.services_wrapper .tab.active').html();
			// $('.title_active_slide .name').html(title);
			// $('.title_active_slide').removeClass('children');
			$('.nav_buttons').css("display", "flex");
		}
	}).eq(0).addClass("active");

	// var title = $('.services_wrapper .tabs .tab.active').html();
	// $('.title_active_slide .name').html(title);


	$('.tab_next').click(function() {
		nextSlide();
	});
	$('.tab_prev').click(function() {
		prevSlide();
	});

	function nextSlide() {
		var slideCount = $('.services_wrapper .slide.active .tab_item').children().length;
		if (slideNow == slideCount || slideNow <= 0 || slideNow > slideCount) {
			galleryIndex++

			$(".services_wrapper .slide.active .tab_item").removeClass("active").eq(0).addClass("left_hidden no_transition").css("z-index", galleryIndex);
			setTimeout(function () {
				$(".services_wrapper .slide.active .tab_item").eq(0).addClass("active").removeClass("left_hidden no_transition");
			}, 15);

			slideNow = 1;
		} else {
			galleryIndex++

			$(".services_wrapper .slide.active .tab_item").removeClass("active").eq(slideNow).addClass("left_hidden no_transition").css("z-index", galleryIndex);
			setTimeout(function () {
				$(".services_wrapper .slide.active .tab_item").eq(slideNow - 1).addClass("active").removeClass("left_hidden no_transition");
			}, 15);

			slideNow++
		}
	}
	function prevSlide() {
		var slideCount = $('.services_wrapper .slide.active .tab_item').children().length;
		if (slideNow == 1 || slideNow <= 0 || slideNow > slideCount) {
			galleryIndex++

			$(".services_wrapper .slide.active .tab_item").removeClass("active").eq(slideCount - 1).addClass("left_hidden no_transition").css("z-index", galleryIndex);
			setTimeout(function () {
				$(".services_wrapper .slide.active .tab_item").eq(slideCount - 1).addClass("active").removeClass("left_hidden no_transition");
			}, 15);

			slideNow = slideCount;
		} else {
			galleryIndex++

			$(".services_wrapper .slide.active .tab_item").removeClass("active").eq(slideNow - 2).addClass("left_hidden no_transition").css("z-index", galleryIndex);
			setTimeout(function () {
				$(".services_wrapper .slide.active .tab_item").eq(slideNow - 1).addClass("active").removeClass("left_hidden no_transition");
			}, 15);
			slideNow--;
		}
	}


	var restNow = 1;
	var restCount = $('.rest_slider .slide').length;
	var restIndex = 0;

	$(".rest_slider .slide:first").addClass("active");
	// $(".rest_slider .slide:first").removeClass("left_hidden");

	$('.rest_next').click(function() {
		nextRest();
	});
	$('.rest_prev').click(function() {
		prevRest();
	});
	function nextRest() {
		if (restNow == restCount || restNow <= 0 || restNow > restCount) {
			restIndex++

			$(".rest_slider .slide").removeClass("active").eq(0).addClass("left_hidden no_transition").css("z-index", restIndex);
			setTimeout(function () {
				$(".rest_slider .slide").eq(0).addClass("active");
			}, 15);
			restNow = 1;
		} else {
			restIndex++

			$(".rest_slider .slide").removeClass("active").eq(restNow).addClass("left_hidden no_transition").css("z-index", restIndex);
			setTimeout(function () {
				$(".rest_slider .slide").eq(restNow - 1).addClass("active");
			}, 15);

			restNow++
		}
	}
	function prevRest() {
		if (restNow == 1 || restNow <= 0 || restNow > restCount) {
			restIndex++

			$(".rest_slider .slide").removeClass("active").eq(restCount - 1).addClass("left_hidden no_transition").css("z-index", restIndex);
			setTimeout(function () {
				$(".rest_slider .slide").eq(restCount - 1).addClass("active");
			}, 15);

			restNow = restCount;
		} else {
			restIndex++

			$(".rest_slider .slide").removeClass("active").eq(restNow - 2).addClass("left_hidden no_transition").css("z-index", restIndex);
			setTimeout(function () {
				$(".rest_slider .slide").eq(restNow - 1).addClass("active");
			}, 15);
			restNow--;
		}
	}



	var swiper = new Swiper(".mySwiper", {
		loop: true,
		effect: 'fade',
		shortSwipes: false,
		simulateTouch: false,
		allowTouchMove: false,
		observer: true,
		observeParents: true,
		navigation: {
			nextEl: ".nav_buttons .slide_next",
			prevEl: ".nav_buttons .slide_prev",
		},
	});

	var swiper = new Swiper(".mySwiper_thumbs", {
		loop: true,
		slidesPerView: 4,
		spaceBetween: 42,
		shortSwipes: false,
		simulateTouch: false,
		allowTouchMove: false,
		observer: true,
		observeParents: true,
		breakpoints: {
			360: {
				spaceBetween: 20,
			},
			581: {
				spaceBetween: 42,
			},
			769: {
				spaceBetween: 20,
			},
			992: {
				spaceBetween: 30,
			},
		},
		navigation: {
			nextEl: ".nav_buttons .slide_next",
			prevEl: ".nav_buttons .slide_prev",
		},

	});

	$('.mySwiper').on('click', '.select__item', function () {
		$('.select__head').removeClass('open');
		$('.select__item').removeClass('active');
		$(this).addClass('active');
		$(this).parent().fadeOut();
		$(this).parent().prev().children('.name').text($(this).text());
		$(this).parent().prev().prev().val($(this).text());
	});





	$('.popup-with-form').magnificPopup({
		removalDelay: 500,
		callbacks: {
			beforeOpen: function() {
				this.st.mainClass = this.st.el.attr('data-effect');
			}
		},
		midClick: true
	});

	$('.play_button').magnificPopup({
		disableOn: 700,
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,
		fixedContentPos: false,
	});



});