document.addEventListener("DOMContentLoaded", function() {

	var $ = jQuery.noConflict(),
		win = $(window).width(),
		d = new Date(),
		n = d.getFullYear(),
		page = $('html, body'),
		pageUrl = window.location.href,
		i = 0;

	$('.foo__copy em').text(n).addClass('foo__copy-year');

	/**
	* Menu Scroll
	*/
	var lastScrollTop = 0;
	
	$(window).scroll(function(e) {    
		var scroll = $(window).scrollTop();
		var HeroHeader = $('.sticky-header');
		var st = $(this).scrollTop();

		if (scroll >= 0) {
			$(HeroHeader).addClass("onScroll");
		} else {
			$(HeroHeader).removeClass("onScroll");
		}

		if (st > lastScrollTop) {
			$(HeroHeader).removeClass("onScrollUp");
		} else {
			$(HeroHeader).addClass("onScrollUp");
		}

		lastScrollTop = st;

		if (scroll >= 100) {
			$('.scroll-up').removeClass('hidden');
			$('.site-header').addClass('static');
		} else {
			$('.scroll-up').addClass('hidden');
			$('.site-header').removeClass('static');
		}
	});

	setTimeout(function() {
		$('.acf-form-sent').text('');
		if ( $('.acf-form-sent').hasClass('acf-form-sent') ) {
			history.replaceState(null, null, ' ');
		}
	}, 2000);

	// Scroll Up button
	$('.scroll-up').click(function(e) {
		page.animate({
			scrollTop : 0,
		}, 100);
		e.preventDefault();
	});

	// Scroll Down button
	$('.scroll-down').click(function(e) {
		var SlideHeight = $('.section__home-hero').height();
		// /console.log(SlideHeight);
		page.animate({
			scrollTop : page.scrollTop() + SlideHeight,
		}, 1000);
		e.preventDefault();
	});

	/**
	 * Mobile Menu Toggle
	 */
	$('.navbar-toggler-btn').on('click', function() {
		$('body').toggleClass("menu-open");
	});

	$('.header-nav-overlay').on('click', function() {
		$('.navbar-toggler-btn').trigger("click");
	});

	$(window).resize(function () {
		$('.dp-header-menu-container .navbar-nav input').prop('checked', false);
	});

	$('.dp-header-menu-container .navbar-nav>.menu-item a').each(function() {
		var target = $(this).attr('href');
		if( pageUrl === target ) {
			$(this).parent('.nav-item').addClass('menu-item-current');
		} else {
			$(this).parent('.nav-item').removeClass('menu-item-current');
		}
	});

	$('.wpcf7-select, .acf-form select').select2( { minimumResultsForSearch: 20 } );

	$('body').on('wpcf7-field-groups/added', function(e, g) {
		let $select = $(g).find('.wpcf7-select');
		$select.each(function(i, select) {
			$(select).removeClass('select2-hidden-accessible')
				.removeAttr('data-select2-id')
				.siblings('.select2-container').remove();
			$(select).select2({ minimumResultsForSearch: 20 });
		});
	});

	var postTitle = $("meta[property='og:title']").attr("content");
	var postContent = postTitle + ' - ' + pageUrl;

	$('.bssbSocialShare li.icon[data-social="mail"]').click(function() {
		window.location = "mailto:?subject=" + postTitle + "&body=" + postContent;
	});

	// Remove empty p & style tags
	$('div').each(function() { 
		if ( $(this).attr('style') === '' )  { 
			$(this).removeAttr('style')
		}
	});	

	if (window.location.href.indexOf("brochure-download") > -1) {
		$(".hero-wrap").hide();
	}

	$(".img-cover img").each(function(i, elem) {
		var h = $(this).parents('.img-cover').siblings().height() + 200;
		var img = $(elem);
		img.css("height",h);
	});

	$('.accordion-button').addClass('collapsed');

	// Tabs
	var id = $('.section__tabs--content').attr('id');
	$('.section__tabs ul.nav li').removeClass('active');
	$('.section__tabs ul.nav li').each(function() {
		i++;
		$(this).addClass('tab-id-' + i);
		$(this).children('a').attr('data-tab','#tab-id-' + i);
		var cl = $(this).attr('class');		
		if ( $(this).hasClass(id) ) {
			$(this).addClass('active');
			//console.log(id);
		}
	});

	/**
	 * ACF Blocks TABS
	 */
	const tabs = document.querySelectorAll("[data-tab-target]");
	const tabContents = document.querySelectorAll("[data-tab-content]");

	$(tabs).each(function(i, tab){
		
		$(tab).on('click', function(){

			const target = $(this).attr("data-tab-target");

			$(tabContents).each(function(i, tabContent) {
				$(tabContent).removeClass('active');
			});

			$(tabs).each(function(i, tab){
				$(tab).removeClass('active');
			});

			$(tab).addClass('active');
			$(target).addClass('active');

			$(tabContents).each(function(tabContent){
				const targetContent = $(this).attr("data-tab-content");

				if (targetContent == target) {
					let activeContent = document.getElementById(target);
					$(activeContent).addClass('active');
				}
			});
		});
	});

	/**
	 * Mobile Menu Toggle
	 */
	if ($("body").hasClass("menu-open")) {
		$('body').removeClass("menu-open");
	} else {
		$('body').toggleClass("menu-open");
	}

	$('body').removeClass("menu-open");


	$('.header-nav-overlay').on('click', function() {
		$('body').removeClass("menu-open");
	});

	$(window).resize(function () {
		$('.dp-header-menu-container .navbar-nav input').prop('checked', false);
	});

	$('.dp-header-menu-container .navbar-nav>.menu-item a').each(function() {
		var target = $(this).attr('href');
		if( pageUrl === target ) {
			$(this).parent('.nav-item').addClass('menu-item-current');
		} else {
			$(this).parent('.nav-item').removeClass('menu-item-current');
		}
	});

	/**
	 * Switcher Dark Mode
	 */
	const darkTheme = "dark-theme";
	const darkThemeSetUp = () => {
		if (getCurrentTheme() === "dark") {
			document.getElementById("toggleBtn").checked = true;
		} else {
			document.getElementById("toggleBtn").checked = false;
		}
	};
	const getCurrentTheme = () => document.body.classList.contains(darkTheme) ? "dark" : "light";
	const selectedTheme = localStorage.getItem("selected-theme");
	if (selectedTheme === "dark") {
		document.body.classList[selectedTheme === "dark" ? "add" : "remove"](
			darkTheme
		);
		darkThemeSetUp();
	}
	const themeButton = document.getElementById("toggleBtn");
	themeButton.addEventListener("change", () => {
		document.body.classList.toggle(darkTheme);
		localStorage.setItem("selected-theme", getCurrentTheme());
		darkThemeSetUp();
	});

	if ($("body").hasClass("light-dark")) {
		// console.log('btn active');
		$(".switcher-darkmode").css("display","block");
	} else {
		// console.log('btn not active');
		$(".switcher-darkmode").css("display","none");
	}

	/**
	 * Switching Cart
	 */
	if ($("body").hasClass("woo-cart")) {
		$(".block-cart").css({"display":"flex","opacity":"1"});
	}
	else {
		$(".block-cart").css("display","none");
	}

	/**
	 * Switching Account Btn
	 */
	if ($("body").hasClass("woo-account")) {
		$(".block-account").css({"display":"flex","opacity":"1"});
	}
	else {
		$(".block-account").css("display","none");
	}

	/**
	 * Switching Flags Btn
	 */
	if ($("body").hasClass("menu-flags")) {
		$(".block-polylang").css({"display":"flex","opacity":"1"});
	}
	else {
		$(".block-polylang").css("display","none");
	}

	if ( $("body nav.header-nav").hasClass("megamenu") ) { 
		$(".navbar-toggler-btn").css({"display":"none"});
	} else {
		$(".navbar-toggler-btn").css({"display":"block"});
	}

	/**
	 * Form Range field
	 */
	var rangeSlider = function() {

		var slider = $('.range-slider'),
			range = $('.range-slider__range'),
			value = $('.range-slider__value');
		
		slider.each(function() {
	
			value.each(function(){
				var value = $(this).prev().attr('value');
				$(this).html(value).val(value);
			});
		
			range.on('input', function(){
				$(this).next(value).html(this.value);
				$(this).attr('value',this.value);
			});
		});
	};
	rangeSlider();
});