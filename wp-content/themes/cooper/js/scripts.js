import $ from 'jquery'; window.jQuery = $; window.$ = $;
// // Import vendor jQuery plugin example
// import '~/app/libs/mmenu/dist/mmenu.js'

import { Swiper, Lazy, Autoplay, Navigation, Pagination, Scrollbar, Controller, EffectFade, Thumbs } from 'swiper';
Swiper.use([Lazy, Autoplay, Navigation, Pagination, Scrollbar, Controller, EffectFade, Thumbs]);

import { Fancybox } from '@fancyapps/ui';

import lozad from 'lozad';

import AOS from 'aos';

import iFrameResize from 'iframe-resizer';

import '~/wp-content/themes/cooper/vendor/formstyler/jquery.formstyler.min.js';

import '~/wp-content/themes/cooper/vendor/inputmask/jquery.inputmask.bundle.min.js';

document.addEventListener('DOMContentLoaded', () => {

	const observer = lozad();
	observer.observe();

	const appHeight = () => {
		let vh = window.innerHeight * 0.01;
		document.documentElement.style.setProperty('--vh', `${vh}px`);
	};
	appHeight();

	window.addEventListener('resize', appHeight);
	window.addEventListener('load', appHeight);

	AOS.init({
		offset: 0,
		once: false,
		duration: 1000,
		easing: 'ease-in-out'
	});

	let divided = document.querySelector('.divided');
	if (divided) {
		let dotsCount = divided.dataset.dots;

		for (let i = 0; i < dotsCount; i++) {
			let dot = document.createElement('i');
			divided.prepend(dot);
		}
	}

	let lastScrollTop = 0;
	let header = document.querySelector('.header');
	let headerHeight = header.scrollHeight;
	let wrapper = document.querySelector('.wrapper');

	wrapper.style.paddingTop = headerHeight + 'px';

	let headerPos = function () {

		let top = window.pageYOffset;
		let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

		if (lastScrollTop > headerHeight) {
			header.classList.add('fixed');
		}

		if (lastScrollTop > top) {
			header.classList.add('scrollUp');
			header.classList.remove('scrollDown');
		} else if (scrollTop > headerHeight) {
			header.classList.remove('scrollUp');
			header.classList.add('scrollDown');
		}

		if (scrollTop == 0) {
			header.classList.remove('scrollUp');
			header.classList.remove('scrollDown');
			header.classList.remove('fixed');
		}
		lastScrollTop = top;

	};

	window.addEventListener('load', headerPos);
	window.addEventListener('scroll', headerPos);

	let mainSlider = new Swiper('.main-slider', {
		slidesPerView: 1,
		spaceBetween: 0,
		simulateTouch: false,
		autoplay: {
			delay: 3000,
		},
		parallax: true,
		preloadImages: false,
		lazy: {
			loadPrevNext: true,
		},
		effect: 'slide',
		// fadeEffect: {
		// 	crossFade: true
		// },
		speed: 1000,
		loop: false,
		watchSlidesProgress: false,
		watchOverflow: true,
		navigation: {
			nextEl: '.swiper-side-next',
			prevEl: '.swiper-side-prev',
		},
		pagination: {
			el: '.main-bottom-pagination.swiper-pagination',
			type: "progressbar"
		},
		on: {
			resize: function () {
				mainSlider.update();
			},
		},
		breakpoints: {
			320: {
				simulateTouch: true
			},
			1024: {
				simulateTouch: false
			}
		}
	});

	let mainSliderDesc = new Swiper('.main-bottom-slider', {
		slidesPerView: 1,
		spaceBetween: 20,
		watchSlidesProgress: true,
		watchOverflow: true,
		effect: 'fade',
		fadeEffect: {
			crossFade: true
		},
		loop: false,
		on: {
			resize: function () {
				mainSliderDesc.update();
			}
		},
		pagination: {
			el: ".main-bottom-fraction.swiper-pagination",
			type: "fraction",
		},
	});

	mainSliderDesc.controller.control = mainSlider;
	mainSlider.controller.control = mainSliderDesc;

	let menuButton = document.querySelector('.menu-button');
	let mobileNav = document.querySelector('.mobile-nav');
	let mobileNavClose = document.querySelector('.mobile-nav__close');
	let overlay = document.querySelector('.overlay');
	let body = document.querySelector('body');
	let openMenu = function () {
		menuButton.classList.toggle('active');
		mobileNav.classList.toggle('open');
		mobileNav.classList.toggle('hide');
		overlay.classList.toggle('active');
		body.classList.toggle('overflow');
		appHeight();
	};

	menuButton.addEventListener('click', openMenu, true);
	mobileNavClose.addEventListener('click', openMenu, true);
	overlay.addEventListener('click', openMenu, true);

	// Circle size

	let circle = document.querySelectorAll('.mainnumbers-item');

	circle.forEach(item => {
		let circleWidth = item.offsetWidth;
		item.style.height = circleWidth + 'px';
	});

	window.addEventListener('resize', function (event) {
		circle.forEach(item => {
			let circleWidth = item.offsetWidth;
			item.style.height = circleWidth + 'px';
		});
	}, true);

	// Scroll top
	// let toTopBtn = document.querySelector('.arrow-top');

	let scrollTopBtn = document.querySelector('.arrow-top');

	window.addEventListener('scroll', scrollFunction);
	function scrollFunction() {
		if (document.body.scrollTop > 800 || document.documentElement.scrollTop > 800) {
			scrollTopBtn.classList.add('show');
		} else {
			scrollTopBtn.classList.remove('show');
		}
	}

	function topFunction() {
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	}

	scrollTopBtn.addEventListener('click', topFunction);

	// Main title
	let mainTitleFront = document.querySelector('.main-desc__title_front');
	let mainTitleBack = document.querySelector('.main-desc__title_back');

	if (mainTitleFront) {
		let letterFirst = mainTitleFront.textContent;
		mainTitleBack.innerText = `${letterFirst[0]}`;
	}

	// Innermain title
	let innerTitleFront = document.querySelector('.innermain-desc__title_front span');
	let innerTitleBack = document.querySelector('.innermain-desc__title_back');
	let innerSubTitleFront = document.querySelector('.innermain-desc__subtitle_front');
	let innerSubTitleBack = document.querySelector('.innermain-desc__subtitle_back');

	if (innerTitleFront) {
		let letterFirstTitle = innerTitleFront.textContent;
		innerTitleBack.innerText = `${letterFirstTitle[0]}`;
		let letterFirstSubtitle = innerSubTitleFront.textContent;
		innerSubTitleBack.innerText = `${letterFirstSubtitle[0]}`;
	}

	$("input[type=tel]").inputmask("+99 (9) 99 999 999 99-9", {
		showMaskOnHover: false
	});

	//FormStyler
	$('select').styler({
		selectSmartPositioning: false
	});

	let wpcf7Elm = $('.wpcf7');
	let formAlert = function () {
		$('.wpcf7-response-output', this).stop().fadeIn('slow');
		setTimeout(() => {
			$('.wpcf7-response-output', this).stop().fadeOut('slow');
			$('.is-close').trigger('click');
		}, 2000);
	};

	let formAlertError = function () {
		$('.wpcf7-response-output', this).stop().fadeIn('slow');
		setTimeout(() => {
			$('.wpcf7-response-output', this).stop().fadeOut('slow');
		}, 2000);
	};

	wpcf7Elm.on('wpcf7submit', formAlertError);
	wpcf7Elm.on('wpcf7invalid', formAlertError);
	wpcf7Elm.on('wpcf7spam', formAlert);
	wpcf7Elm.on('wpcf7mailsent', formAlert);
	wpcf7Elm.on('wpcf7mailfailed', formAlertError);

	// let map = document.querySelectorAll("#contact-map");

	// if (map.length) {
	// 	ymaps.ready(function () {
	// 		let centerMap = $("#contact-map").data('center');

	// 		var myMap = new ymaps.Map("contact-map", {
	// 			// Координаты центра карты.
	// 			// Порядок по умолчнию: «широта, долгота».
	// 			center: centerMap,
	// 			// Уровень масштабирования. Допустимые значения:
	// 			// от 0 (весь мир) до 19.
	// 			zoom: 17,
	// 			// Элементы управления
	// 			// https://tech.yandex.ru/maps/doc/jsapi/2.1/dg/concepts/controls/standard-docpage/
	// 			controls: ['zoomControl']

	// 		});
	// 		var myPlacemark = new ymaps.Placemark(centerMap, {
	// 			center: centerMap,
	// 			hintContent: 'ООО «ВИБРОРЕНТ»',
	// 			balloonContent: 'ООО «ВИБРОРЕНТ» <br />121471, г. Москва, ул. Рябиновая, дом 28а, строение 1'
	// 		}, {
	// 			// Опции.
	// 			// Необходимо указать данный тип макета.
	// 			iconLayout: 'default#image',
	// 			// Своё изображение иконки метки.
	// 			iconImageHref: '../wp-content/themes/vibrorent/images/map-pin_3.svg',
	// 			// Размеры метки.
	// 			iconImageSize: [40, 60],
	// 			// Смещение левого верхнего угла иконки относительно
	// 			// её "ножки" (точки привязки).
	// 			iconImageOffset: [-20, -50]
	// 		});

	// 		myMap.geoObjects
	// 			.add(myPlacemark);
	// 	});
	// }

});
