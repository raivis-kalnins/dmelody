
document.addEventListener("DOMContentLoaded", function() {

	var $ = jQuery.noConflict(),
		swiper,
		testimonials,
		technical,
		sectors;

	// Related pages & posts
	swiper = new Swiper('.related-pages.swiper-slider, .related-posts.swiper-slider', {
		observeSlideChildren: true,
		slideToClickedSlide: true,
		updateOnWindowResize: true,
		slidesPerView: 3,
		spaceBetween: 30,
		loop: true,
		speed: 5000,
		breakpoints: {
			320: {
				slidesPerView: 1
			},
			760: {
				slidesPerView: 2
			},
			992: {
				slidesPerView: 3
			}
		},
		autoplay: {
			delay: 7000,
			disableOnInteraction: false,
		},
		keyboard: {
			enabled: true,
			onlyInViewport: false,
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		grabCursor: true
	});

	testimonials = new Swiper('.testimonials-slider', {
		observeSlideChildren: true,
		slideToClickedSlide: true,
		updateOnWindowResize: true,
		slidesPerView: 1,
		spaceBetween: 30,
		autoHeight: true,
		loop: true,
		speed: 4000,
		breakpoints: {
			320: {
				slidesPerView: 1
			},
			760: {
				slidesPerView: 1
			},
			992: {
				slidesPerView: 1
			}
		},
		autoplay: {
			delay: 4000,
			disableOnInteraction: false,
		},
		keyboard: {
			enabled: true,
			onlyInViewport: false,
		},
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
		},
		grabCursor: true
	});

	technical = new Swiper('.technicals-slider', {
		observeSlideChildren: false,
		slideToClickedSlide: true,
		updateOnWindowResize: true,
		slidesPerView: 1,
		spaceBetween: 30,
		autoHeight: true,
		loop: true,
		speed: 4000,
		breakpoints: {
			320: {
				slidesPerView: 1
			},
			760: {
				slidesPerView: 1.3
			},
			992: {
				slidesPerView: 2.3
			}
		},
		autoplay: {
			delay: 7000,
			disableOnInteraction: false,
		},
		keyboard: {
			enabled: true,
			onlyInViewport: false,
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		  },
		grabCursor: true
	});

	sectors = new Swiper('.sectors-slider', {
		observeSlideChildren: false,
		slideToClickedSlide: true,
		updateOnWindowResize: true,
		slidesPerView: 1,
		spaceBetween: 30,
		autoHeight: true,
		loop: true,
		speed: 2000,
		breakpoints: {
			320: {
				slidesPerView: 1
			},
			760: {
				slidesPerView: 1.3
			},
			992: {
				slidesPerView: 2.3
			}
		},
		autoplay: {
			delay: 1000,
			disableOnInteraction: false,
		},
		keyboard: {
			enabled: true,
			onlyInViewport: false,
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		grabCursor: true
	});
});