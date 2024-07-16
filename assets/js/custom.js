/*--------------------- Copyright (c) 2020 -----------------------

[Master Javascript]

Project: Admin- Responsive HTML Template 

Version: 1.0.0

Assigned to: Theme Forest

-------------------------------------------------------------------*/

(function($) {

    "use strict";



    /*-----------------------------------------------------

    	Function  Start

    -----------------------------------------------------*/

    var admin = {

        initialised: false,

        version: 1.0,

        mobile: false,

        collapseScreenSize: 991,

        sideBarSize: 1199,

        init: function() {

            if (!this.initialised) {

                this.initialised = true;

            } else {

                return;

            }

            /*-----------------------------------------------------

            	Function Calling

            -----------------------------------------------------*/

            this.userToggle();

            this.sideBarToggle();

            this.sideMenu();

            this.sideBarHover();

            this.searchToggle();

            this.rightSlide();

            this.tooltipHover();

            this.counter();

            this.nubberSpin();

            this.singleSlide();

            this.productRemove();

            this.Quantity();

            this.PriceRange();

            this.Product_thumb_slider();

            this.counter_number();

            this.loader();

        },



        /*-----------------------------------------------------

            Fix Header User Button

        -----------------------------------------------------*/

		// loader			

		loader: function () {

			jQuery(window).on('load', function() {

				$(".loader").fadeOut();

				$(".spinner").delay(500).fadeOut("slow");

			});

		},

		// loader



		//Counter Js start

			counter_number: function() {

				if ($('.counter-text').length > 0) {

					$('.counter-text').appear(function() {

					$('.count-no1').countTo();

					});

				}

			},

		//Counter Js end

		

		// Product Thumd Slider js

			Product_thumb_slider: function() {

				if($('.int-thumb-slider').length > 0){

					var galleryThumbs = new Swiper('.gallery-thumbs', {

					  spaceBetween: 10,

					  slidesPerView: 4,

					  freeMode: true,

					  watchSlidesVisibility: true,

					  watchSlidesProgress: true,

					});

					var galleryTop = new Swiper('.gallery-top', {

					  spaceBetween: 10,

					  thumbs: {

						swiper: galleryThumbs

					  }

					});

				}

			},

		// Product Thumd Slider js

		

		// Range Slider start

			PriceRange: function() {

				if($('.range-slider').length > 0){

					$( function() {

						$( "#slider-range" ).slider({

							range: true,

							min: 12,

							max: 2000,

							values: [ 541, 1402 ],

							slide: function( event, ui ) {

								$( "#amount" ).text( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );

							}

						});

						$( "#amount" ).text( "$" + $( "#slider-range" ).slider( "values", 0 ) +

							" - $" + $( "#slider-range" ).slider( "values", 1 ) );

					});

				}

			},

		// Range Slider End

		

		// Quantity js start

			Quantity: function(){

				var quantity=0;

				$('.quantity-plus').on('click', function(e){

					e.preventDefault();

					var quantity = parseInt($(this).siblings('.quantity').val());

					$(this).siblings('.quantity').val(quantity + 1);            



				});

				$('.quantity-minus').on('click', function(e){

					e.preventDefault();

					var quantity = parseInt($(this).siblings('.quantity').val());

					if(quantity>0){

						$(this).siblings('.quantity').val(quantity - 1);

					}

				});				

			},

		// Quantity js End



        userToggle: function() {

            var count = 0;

            $('.user-info').on("click", function() {

                if ($(window).width() <= admin.collapseScreenSize) {

                    if (count == '0') {

                        $('.user-info-box').addClass('show');

                        count++;

                    } else {

                        $('.user-info-box').removeClass('show');

                        count--;

                    }

                }

            });



            $(".user-info-box, .user-info").on('click', function(e) {

                if ($(window).width() <= admin.collapseScreenSize) {

                    event.stopPropagation();

                }

            });



            $('body').on("click", function() {

                if ($(window).width() <= admin.collapseScreenSize) {

                    if (count == '1') {

                        $('.user-info-box').removeClass('show');

                        count--;

                    }

                }

            });

        },



        /*-----------------------------------------------------

            Fix Sidebar Toggle

        -----------------------------------------------------*/



        sideBarToggle: function() {

            $(".toggle-btn").on('click', function(e) {

                e.stopPropagation();

                $("body").toggleClass('mini-sidebar');

                $(this).toggleClass('checked');



            });

            $('.sidebar-wrapper').on('click', function(event) {

                event.stopPropagation();

            });

        },



        /*-----------------------------------------------------

            Fix Side Menu

        -----------------------------------------------------*/



        sideMenu: function() {

            $('.side-menu-wrap ul li').has('.sub-menu').addClass('has-sub-menu');

            $.sidebarMenu = function(menu) {

                var animationSpeed = 300,

                    subMenuSelector = '.sub-menu';

                $(menu).on('click', 'li a', function(e) {

                    var $this = $(this);

                    var checkElement = $this.next();

                    if (checkElement.is(subMenuSelector) && checkElement.is(':visible')) {

                        checkElement.slideUp(animationSpeed, function() {

                            checkElement.removeClass('menu-show');

                        });

                        checkElement.parent("li").removeClass("active");

                    } else if ((checkElement.is(subMenuSelector)) && (!checkElement.is(':visible'))) {

                        var parent = $this.parents('ul').first();

                        var ul = parent.find('ul:visible').slideUp(animationSpeed);

                        ul.removeClass('menu-show');

                        var parent_li = $this.parent("li");

                        checkElement.slideDown(animationSpeed, function() {

                            checkElement.addClass('menu-show');

                            parent.find('li.active').removeClass('active');

                            parent_li.addClass('active');

                        });

                    }

                    if (checkElement.is(subMenuSelector)) {

                        e.preventDefault();

                    }

                });

            }

            $.sidebarMenu($('.main-menu'));

            $(function() {

                for (var a = window.location, counting = $(".main-menu a").filter(function() {

                        return this.href == a;

                    }).addClass("active").parent().addClass("active");;) {

                    if (!counting.is("li")) break;

                    counting = counting.parent().addClass("in").parent().addClass("active");

                }

            });

        },



        /*-----------------------------------------------------

            Fix Sidebar Hover

        -----------------------------------------------------*/



        sideBarHover: function() {

            if ($(window).width() >= admin.sideBarSize) {

                $(".main-menu").hover(function() {

                    $('body').addClass('sidebar-hover');

                }, function() {

                    $('body').removeClass('sidebar-hover');

                });

            }

        },



        /*-----------------------------------------------------

            Fix  Search

        -----------------------------------------------------*/



        searchToggle: function() {

            $('.search-toggle').on("click", function() {

                $('.serch-wrapper').addClass('show-search');

            });

            $('.search-close, .main-content').on("click", function() {

                $('.serch-wrapper').removeClass('show-search');

            });

        },



        /*-----------------------------------------------------

            Fix Sidebar

        -----------------------------------------------------*/



        rightSlide: function() {

            $(".setting-info").on('click', function(e) {

                e.stopPropagation();

                $("body").toggleClass('open-setting');

            });

            $('body, .close-btn').on('click', function() {

                $('body').removeClass('open-setting');

            });

            $('.slide-setting-box').on('click', function(event) {

                event.stopPropagation();

            });



        },



        /*-----------------------------------------------------

            Fix Toltip

        -----------------------------------------------------*/



        tooltipHover: function() {

            if ($('.toltiped').length > 0) {

                $(".toltiped").tooltip();

            }

            if ($('.toltiped-right').length > 0) {

                $(".toltiped-right").tooltip({

                    'placement': 'right',

                });

            }

        },



        /*-----------------------------------------------------

            Fix Remove Product

        -----------------------------------------------------*/



        productRemove: function() {

            $(".remove-product").on('click', function() {

                $(this).closest('.product-thumb-wrap').parent().remove();

            });

        },





        /*-----------------------------------------------------

				Fix Counter

		-----------------------------------------------------*/

        counter: function() {

            if ($('.counter-holder').length > 0) {

                var a = 0;

                $(window).on('scroll',function() {

                    var topScroll = $('.counter-holder').offset().top - window.innerHeight;

                    if (a == 0 && $(window).scrollTop() > topScroll) {

                        $('.count-no').each(function() {

                            var $this = $(this),

                                countTo = $this.attr('data-count');

                            $({

                                countNum: $this.text()

                            }).animate({

                                countNum: countTo

                            }, {

                                duration: 5000,

                                easing: 'swing',

                                step: function() {

                                    $this.text(Math.floor(this.countNum));

                                },

                                complete: function() {

                                    $this.text(this.countNum);

                                }

                            });

                        });

                        a = 1;

                    }

                });

            };

        },



        /*-----------------------------------------------------

			Fix Number Spin

		-----------------------------------------------------*/

        nubberSpin: function() {

            if ($('.number-spin').length > 0) {

                $('.number-increase').on('click', function() {

                    if ($(this).prev().val() < 50000) {

                        $(this).prev().val(+$(this).prev().val() + 1);

                    }

                });

                $('.number-decrease').on('click', function() {

                    if ($(this).next().val() > 1) {

                        if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);

                    }

                });

            }

        },





        /*-----------------------------------------------------

            Fix Single Slide

        -----------------------------------------------------*/

        singleSlide: function() {

            if ($('.swiper-container.s1').length > 0) {

                var slingleSlideSwiper = new Swiper('.swiper-container.s1', {

                    autoHeight: false,

                    autoplay: false,

                    loop: true,

                    spaceBetween: 0,

                    centeredSlides: false,

                    speed: 1500,

                    autoplay: {

                        delay: 1000,

                    },

                    navigation: {

                        nextEl: '.swiperButtonNext',

                        prevEl: '.swiperButtonPrev',

                    },

                });

            }

        },



    };



    admin.init();



})(jQuery);







$(document).ready(function() {

(function($) {

    "use strict";

    //color picker start

    $(window).on("load", function() {



        var colorcode = document.cookie;

        if (colorcode != "") {

            var cname = "colorcssfile";

            var name = cname + "=";

            var cssname = '';

            var ca = document.cookie.split(';');

            for (var i = 0; i < ca.length; i++) {

                var c = ca[i];

                while (c.charAt(0) == ' ') c = c.substring(1);

                if (c.indexOf(name) != -1) {

                    cssname = c.substring(name.length, c.length);

                }

            }



            if (cssname != '') {

                var new_style = 'assets/css/' + cssname + '.css';

                $('#theme-change').attr('href', new_style);

            }

        }

    });

    //Color Change Script

    $('.colorchange').on("click", function() {

        var name = $(this).attr('id');

        var new_style = 'assets/css/' + name + '.css';

        $('#theme-change').attr('href', new_style);

    });



    $("#style-switcher .bottom a.settings").on("click", function(e) {

	e.preventDefault();

	var div = $("#style-switcher");

	if (div.css("right") === "-133px") {

		$("#style-switcher").animate({

			right: "0px"

		});

	} else {

		$("#style-switcher").animate({

			right: "-133px"

		});

	}
    })(jQuery);

});

    //color picker end



});


(function($) {

    "use strict";
    // -----Country Code Selection
    
    $(".Mobile_code").intlTelInput({
    	separateDialCode: true,
    });
    
    $(".WMobile_code").intlTelInput({
    	separateDialCode: true,
    });
    
    
    
    $(document).ready(function() {
    
            $('.iti--separate-dial-code').on('click',function() { 
    
              var countryCode = $('.iti__selected-dial-code').html();
    
              $('#UC_code').val(countryCode);
    
              $('#profile_phone').val(countryCode);
    
              $('#company_fax').val(countryCode);
    
              $('#c_phone').val(countryCode);
    
              $('#profile_whatsup').val(countryCode);
    
              $('#rg_phone').val(countryCode);
    
              $('#up_phone').val(countryCode);
    
           });
    
        });
    
    //----------------------------------------Flie Upload--------------------------------------//
    var baseUrl = $("#burl").val();
    if(window.location.href==baseUrl+'admin/add-property' || window.location.href==baseUrl+'agent/add-property' || window.location.href==baseUrl+'admin/submit-listing'  || window.location.href==baseUrl+'user/submit-listing'  || window.location.href==baseUrl+'user/add-property' || window.location.href==baseUrl+'agent/submit-listing' ||  window.location.href.indexOf("pid") > -1){
        $('#images').imageUploader({
        	imagesInputName: 'images',
        	extensions: ['.jpg','.jpeg','.png','.gif'],
        	mimes: ['image/jpeg','image/png','image/gif'],
        });
        $('#videos').imageUploader({
        	imagesInputName: 'videos',
        	extensions: ['.mp4'],
        	mimes: ['video/mp4'],
        });
    }
    
    
    
    $(document).ready(function() {
    
        
        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
    
                reader.onload = function (e) {
                    $('.image').attr('src', e.target.result);
                }
        
                reader.readAsDataURL(input.files[0]);
            }
        }
        
        var readURL1 = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
    
                reader.onload = function (e) {
                    $('.image1').attr('src', e.target.result);
                }
        
                reader.readAsDataURL(input.files[0]);
            }
        }
        var readURL2 = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
    
                reader.onload = function (e) {
                    $('.image2').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        
    
        $(".file-upload").on('change', function(){
            readURL(this);
        });
        
        $("#main_logo1").on('change', function(){
            readURL1(this);
        });
        
        $("#main_logo2").on('change', function(){
            readURL2(this);
        });
        
        $("#hover1").on('click', function() {
           $("#main_logo1").click();
        });
        
        $("#hover2").on('click', function() {
           $("#main_logo2").click();
        });
        
        $(".hover-image").on('click', function() {
           $(".file-upload").click();
        });
        
        $(".hover-circle-image").on('click', function() {
           $(".file-upload").click();
        });
    });
    
    /* ckeditor5 manual code */
    if(window.location.href==baseUrl+'agent/add-property' || window.location.href==baseUrl+'admin/submit-listing' || window.location.href==baseUrl+'user/add-property' || window.location.href==baseUrl+'user//submit-listing' || window.location.href==baseUrl+'agent/submit-listing' || window.location.href==baseUrl+'admin/add-property' || window.location.href.indexOf("pid") > -1 || window.location.href.indexOf("section_id") > -1){
        var editors = ClassicEditor
        	.create( document.querySelector( '#description_short' ), {
        		toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'cut', 'copy', 'paste' ],
        		heading: {
        			options: [
        				{ model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
        				{ model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
        				{ model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
        				{ model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
        				{ model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
        				{ model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
        				{ model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
        			]
        		}
        	} )
        	.then( editor => {
        	})
        	.catch( error => {
        	} );
        ClassicEditor
        	.create( document.querySelector( '#description_long' ), {
        		toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        		heading: {
        			options: [
        				{ model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
        				{ model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
        				{ model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
        				{ model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
        				{ model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
        				{ model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
        				{ model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
        			]
        		}
        	} )
        	.then( editor => {
        	})
        	.catch( error => {
        	} );
        ClassicEditor
        	.create( document.querySelector( '#company_detail' ), {
        		toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        		heading: {
        			options: [
        				{ model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
        				{ model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
        				{ model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
        				{ model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
        				{ model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
        				{ model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
        				{ model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
        			]
        		}
        	} )
        	.then( editor => {
        	})
        	.catch( error => {
        	} );
        ClassicEditor
        	.create( document.querySelector( '#main_content' ), {
        		toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        		heading: {
        			options: [
        				{ model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
        				{ model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
        				{ model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
        				{ model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
        				{ model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
        				{ model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
        				{ model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
        			]
        		}
        	} )
        	.then( editor => {
        	})
        	.catch( error => {
        	} );
    }
    
    /* Datatable initiate code */	
    $('.example').ready(function() {
    	$('.data_table').DataTable();
    } );
    
})(jQuery);