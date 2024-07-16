'use strict';

// menu options custom affix
var fixed_top = $(".header");
$(window).on("scroll", function(){
    if( $(window).scrollTop() > 50){  
        fixed_top.addClass("animated fadeInDown menu-fixed");
    }
    else{
        fixed_top.removeClass("animated fadeInDown menu-fixed");
    }
});

// mobile menu js
$(".navbar-collapse>ul>li>a, .navbar-collapse ul.sub-menu>li>a").on("click", function() {
  const element = $(this).parent("li");
  if (element.hasClass("open")) {
    element.removeClass("open");
    element.find("li").removeClass("open");
  }
  else {
    element.addClass("open");
    element.siblings("li").removeClass("open");
    element.siblings("li").find("li").removeClass("open");
  }
});

const widgetBtn = $('.sidebar-widget .title-btn');
const widgetBody = $('.sidebar-widget__body');

widgetBtn.each(function(){
  $(this).on('click', function(){
    $(this).parent().siblings(widgetBody).slideToggle();
  });
});

const selectMenuItem = $('.select-menu-list > li');
selectMenuItem.each(function(){
  $(this).on('click', function(){
    var el = $(this);
    if (el.hasClass('active')) {
      el.toggleClass('active').siblings().show();
    }else{
      el.toggleClass('active').siblings().hide();
    }
  });
});


//preloader js code
$(".preloader").delay(300).animate({
	"opacity" : "0"
	}, 300, function() {
	$(".preloader").css("display","none");
});


// wow js init
new WOW().init();

// lightcase plugin init
$('a[data-rel^=lightcase]').lightcase();

// main wrapper calculator
var bodySelector = document.querySelector('body');
var header = document.querySelector('.header');
var footer = document.querySelector('.footer');
(function(){
  if(bodySelector.contains(header) && bodySelector.contains(footer)){
    var headerHeight = document.querySelector('.header').clientHeight;
    var footerHeight = document.querySelector('.footer').clientHeight;

    // if header isn't fixed to top
    // var totalHeight = parseInt( headerHeight, 10 ) + parseInt( footerHeight, 10 ) + 'px'; 
    
    // if header is fixed to top
    var totalHeight = parseInt( footerHeight, 10 ) + 'px'; 
    var minHeight = '100vh';
    document.querySelector('.main-wrapper').style.minHeight = `calc(${minHeight} - ${totalHeight})`;
  }
})();

// Animate the scroll to top
$(".scroll-top").on("click", function(event) {
	event.preventDefault();
	$("html, body").animate({scrollTop: 0}, 300);
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip({
    boundary: 'window'
  })
});

// custom input animation js
$('.custom--form-group .form--control').on('input', function(){
  let passfield = $(this).val();
  if (passfield.length < 1){
      $(this).removeClass('hascontent');
  }else{
      $(this).addClass('hascontent');
  }
});

const advanceOpenBtn = $('.advance-btn');
const advanceCloseBtn = $('.sidebar-close-btn');
const advanceWrapper = $('.advance-search-area');
advanceOpenBtn.on('click', function(){
  advanceWrapper.slideToggle();
});


$('.select2-basic').select2();



// grid & list view js 
const gridBtn = $('.grid-view-btn');
const listBtn = $('.list-view-btn');

const gridView = $('.grid-view');
const listView = $('.list-view');

const cardView = $('.card-view-area');

gridBtn.on('click', function(){
  // button active class check
  if($(this).hasClass('active')){
    return true
  } else {
    $(this).addClass('active');
    $(this).siblings('.list-view-btn').removeClass('active');
  }
  // grid & list view check
  if(cardView.hasClass('list-view')) {
    cardView.removeClass('list-view');
    cardView.addClass('grid-view');
  } 
})

listBtn.on('click', function(){
  if($(this).hasClass('active')){
    return true
  } else {
    $(this).addClass('active');
    $(this).siblings('.grid-view-btn').removeClass('active');
  }
  // grid & list view check
  if(cardView.hasClass('grid-view')) {
    cardView.removeClass('grid-view');
    cardView.addClass('list-view');
  } 
})

// action-sidebar js 
const actionSidebar = $('.action-sidebar');
const actionSidebarOpenBtn = $('.action-sidebar-open');
const actionSidebarCloseBtn = $('.action-sidebar-close');

actionSidebarOpenBtn.on('click', function(){
  actionSidebar.addClass('active');
});
actionSidebarCloseBtn.on('click', function(){
  actionSidebar.removeClass('active');
});

/* ==============================
					slider area
================================= */

// mainSlider
function mainSlider() {
	var BasicSlider = $('.hero-slider-main');
	BasicSlider.on('init', function (e, slick) {
		var $firstAnimatingElements = $('.single-slide:first-child').find('[data-animation]');
		doAnimations($firstAnimatingElements);
	});
	BasicSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
		var $animatingElements = $('.single-slide[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
		doAnimations($animatingElements);
	});
	BasicSlider.slick({
		slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    infinite: true,
    asNavFor: '.hero-slider-nav'
	});

	function doAnimations(elements) {
		var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
		elements.each(function () {
			var $this = $(this);
			var $animationDelay = $this.data('delay');
			var $animationType = 'animated ' + $this.data('animation');
			$this.css({
				'animation-delay': $animationDelay,
				'-webkit-animation-delay': $animationDelay
			});
			$this.addClass($animationType).one(animationEndEvents, function () {
				$this.removeClass($animationType);
			});
		});
	}
}
mainSlider();

$('.hero-slider-nav').slick({
  slidesToShow: 5,
  slidesToScroll: 1,
  asNavFor: '.hero-slider-main',
  dots: false,
  infinite: true,
  centerMode: true,
  centerPadding: '0px',
  focusOnSelect: true,
  arrows: true,
  prevArrow: '<div class="prev"><i class="las la-angle-left"></i></div>',
  nextArrow: '<div class="next"><i class="las la-angle-right"></i></div>',
  responsive: [
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 3,
      }
    },
    {
      breakpoint: 576,
      settings: {
        slidesToShow: 2,
      }
    }
  ]
});


// feature-ad-slider
$('.new-list-slider').slick({
  // autoplay: true,
  autoplaySpeed: 2000,
  dots: false,
  infinite: true,
  speed: 300,
  slidesToShow: 3,
  arrows: true,
  prevArrow: '<div class="prev"><i class="las la-angle-left"></i></div>',
  nextArrow: '<div class="next"><i class="las la-angle-right"></i></div>',
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
      }
    }
  ]
});

// property details thumb slider
$('.details-thumb-slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  fade: true,
  prevArrow: '<div class="prev"><i class="las la-angle-left"></i></div>',
  nextArrow: '<div class="next"><i class="las la-angle-right"></i></div>',
});