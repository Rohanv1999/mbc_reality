$(document).ready(function(){
(function($) {
    "use strict";
    
        // ===== Toggle Navbar ===== //
        var wrapper5 = $("body");
        wrapper5.prepend('<div class="body-overlay-1"></div>');
        $(".hamburger-menu").on('click',function(){
          $(".menus").toggleClass("menu_open");
          wrapper5.toggleClass("mobile-menu-active");
          $(this).find('i').toggleClass('fa fa-bars fa fa-close');
        });
        $(".body-overlay-1").on('click',function(){
          $(".menus").toggleClass("menu_open");
          wrapper5.toggleClass("mobile-menu-active");
          $(".fa-close").toggleClass("fa fa-bars fa fa-close");
        });
        //========== Team Slider ==========//
    
        var swiper = new Swiper(".teamSwiper", {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            navigation: {
                nextEl: "#team-next",
                prevEl: "#team-prev"
            },
            breakpoints: {
                576: {
                    slidesPerView: 2,
                    spaceBetween: 10
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 10
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 10
                }
            }
        });
    
        //========== Testimonial Slider ==========//
        var swiper = new Swiper(".testimonialSwiper", {
            spaceBetween: 30,
            loop: true,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false
            },
            navigation: {
                nextEl: "#testimonial-next",
                prevEl: "#testimonial-prev"
            }
        });
    
        //========== Partners Slider ==========//
        var swiper = new Swiper(".partnerSwiper", {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            autoplay: {
                delay: 2500,
            },
            navigation: {
                nextEl: "#testimonial-next",
                prevEl: "#testimonial-prev"
            },
            breakpoints: {
                400: {
                    slidesPerView: 2,
                    spaceBetween: 15
                },
                600: {
                    slidesPerView: 3,
                    spaceBetween: 15
                },
                991: {
                    slidesPerView: 4,
                    spaceBetween: 15
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 15
                }
            }
        });
    
        //========== Property Gallery Slider ==========//
        var slider = new Swiper ('.gallery-slider', {
            slidesPerView: 1,
            centeredSlides: true,
            loop: true,
            loopedSlides: 6,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    
        var thumbs = new Swiper ('.gallery-thumbs', {
            slidesPerView: 'auto',
            spaceBetween: 10,
            centeredSlides: true,
            loop: true,
            slideToClickedSlide: true,
        });
    
    
        slider.controller.control = thumbs;
        thumbs.controller.control = slider;
    
       
        // ===== Contact Form Validation ===== //
        $('#usercheck').hide();
        $('#emailcheck').hide();
        $('#phonecheck').hide();
        $('#commentcheck').hide();
    
        var user_err = true;
        var email_err = true;
        var phone_err = true;
        var comment_err = true;
    
        /*------------------ User Name Validation-----------------------*/
    
                $('#username').on('keyup',function(){
                    username_check();
                });
    
                function username_check(){
    
                    var user_val = $('#username').val();
    
                    if(user_val.length == ''){
                        $('#usercheck').show();
                        $('#usercheck').html("**Please Enter User Name");
                        $('#usercheck').focus();
                        $('#usercheck').css("color","#004dff");
                        user_err = false;
                        return false;
    
                    }else{
                        $('#usercheck').hide();
                    }
    
                    if((user_val.length < 3) || (user_val.length > 20) ){
                        $('#usercheck').show();
                        $('#usercheck').html("**Username length must be between 3 to 20");
                        $('#usercheck').focus();
                        $('#usercheck').css("color","#004dff");
                        user_err = false;
                        return false;
    
                    }else{
                        $('#usercheck').hide();
                    }
                }
    
            /*------------------ Email Validation-----------------------*/
    
                $('#u_email').on('keyup',function(){
                    uemail_check();
                });
    
                function uemail_check(){
    
                    var uemail_val = $('#u_email').val();
    
                    if(uemail_val.length == ''){
                        $('#emailcheck').show();
                        $('#emailcheck').html("**Please Enter Email Id");
                        $('#emailcheck').focus();
                        $('#emailcheck').css("color","#004dff");
                        email_err = false;
                        return false;
    
                    }else{
                        $('#emailcheck').hide();
                    }
                    
                    if(uemail_val.indexOf('@')<=0){
                        $('#emailcheck').show();
                        $('#emailcheck').html("**Enter Valid Email Id");
                        $('#emailcheck').focus();
                        $('#emailcheck').css("color","#004dff");
                        email_err = false;
                        return false;
    
                    }else{
                        $('#emailcheck').hide();
                    }
    
                    if((uemail_val.charAt(uemail_val.length-3)!='.')&&(uemail_val.charAt(uemail_val.length-4)!='.')&&(uemail_val.charAt(uemail_val.length-5)!='.')){
                        $('#emailcheck').show();
                        $('#emailcheck').html("**Enter Valid Email Id");
                        $('#emailcheck').focus();
                        $('#emailcheck').css("color","#004dff");
                        email_err = false;
                        return false;
    
                    }else{
                        $('#emailcheck').hide();
                    }
                }
    
            /*------------------ Phone Validation-----------------------*/
    
                $('#u_phone').on('keyup',function(){
                    uphone_check();
                });
    
                function uphone_check(){
    
                    var uphone_val = $('#u_phone').val();
    
                    if(uphone_val.length<6){
                        $('#phonecheck').show();
                        $('#phonecheck').html("**Please Enter Phone Number");
                        $('#phonecheck').focus();
                        $('#phonecheck').css("color","#004dff");
                        phone_err = false;
                        return false;
    
                    }else{
                        $('#phonecheck').hide();
                    }
                }
    })(jQuery);
});

(function($) {
    "use strict";
    
    var baseUrl = $("#burl").val();
    // ===== Range Slider ===== //
    if(window.location.href==baseUrl || (window.location.href.match(/\d-/) && !window.location.href.match(/\?/))){
        var lower_area_rent_Slider = document.querySelector('#rent_lower_area'); //Lower value of area in rent slider
        var upper_area_rent_Slider = document.querySelector('#rent_upper_area'); //Upper value of area in rent slider
        var lower_price_rent_Slider = document.querySelector('#rent_lower_price'); //Lower value of area in rent slider
        var upper_price_rent_Slider = document.querySelector('#rent_upper_price'); //Upper value of area in rent slider
        var lower_area_sale_Slider = document.querySelector('#sale_lower_area'); //Lower value of area in rent slider
        var upper_area_sale_Slider = document.querySelector('#sale_upper_area'); //Upper value of area in rent slider
        var lower_price_sale_Slider = document.querySelector('#sale_lower_price'); //Lower value of area in rent slider
        var upper_price_sale_Slider = document.querySelector('#sale_upper_price');
        
        //== onload initial value ==//
        window.onload = function() {
            var lower_area_rent_sliderVal = parseInt(lower_area_rent_Slider.min); //Get lower slider value
            var upper_area_rent_sliderVal = parseInt(upper_area_rent_Slider.max); //Get upper slider value
            var lower_price_rent_SliderVal = parseInt(lower_price_rent_Slider.min); //Get lower slider value
            var upper_price_rent_SliderVal = parseInt(upper_price_rent_Slider.max); //Get upper slider value
            var lower_area_sale_sliderVal = parseInt(lower_area_sale_Slider.min); //Get lower slider value
            var upper_area_sale_sliderVal = parseInt(upper_area_sale_Slider.max); //Get upper slider value
            var lower_price_sale_sliderVal = parseInt(lower_price_sale_Slider.min); //Get lower slider value
            var upper_price_sale_sliderVal = parseInt(upper_price_sale_Slider.max); //Get upper slider value
            lower_area_rent_Slider.value = lower_area_rent_sliderVal;
            upper_area_rent_Slider.value = upper_area_rent_sliderVal;
            lower_price_rent_Slider.value = lower_price_rent_SliderVal;
            upper_price_rent_Slider.value = upper_price_rent_SliderVal;
            lower_area_sale_Slider.value = lower_area_sale_sliderVal;
            upper_area_sale_Slider.value = upper_area_sale_sliderVal;
            lower_price_sale_Slider.value = lower_price_sale_sliderVal;
            upper_price_sale_Slider.value = upper_price_sale_sliderVal;
            document.getElementById('rent_area_start').innerHTML = lower_area_rent_Slider.value;
            document.getElementById('rent_area_end').innerHTML = upper_area_rent_Slider.value;
            document.getElementById('rent_price_start').innerHTML = lower_price_rent_Slider.value;
            document.getElementById('rent_price_end').innerHTML = upper_price_rent_Slider.value;
            document.getElementById('sale_area_start').innerHTML = lower_area_sale_Slider.value;
            document.getElementById('sale_area_end').innerHTML = upper_area_sale_Slider.value;
            document.getElementById('sale_price_start').innerHTML = lower_price_sale_Slider.value;
            document.getElementById('sale_price_end').innerHTML = upper_price_sale_Slider.value;
        }
        
        //===When the upper value slider of rent area is moved.===//
        upper_area_rent_Slider.oninput = function() {
            var lower_area_rent_sliderVal = parseInt(lower_area_rent_Slider.value); //Get lower slider value
            var upper_area_rent_sliderVal = parseInt(upper_area_rent_Slider.value); //Get upper slider value
           //If the upper value slider is LESS THAN the lower value slider plus one.
           if (upper_area_rent_sliderVal < lower_area_rent_sliderVal) {
              //The lower slider value is set to equal the upper value slider minus one.
              upper_area_rent_Slider.value = lower_area_rent_sliderVal + lower_area_rent_sliderVal*(10/100);
              //If the lower value slider equals its set minimum.
              if (lower_area_rent_sliderVal == lower_area_rent_Slider.min) {
                 //Set the upper slider value to equal 1.
                 upper_area_rent_Slider.value = 1;
              }
           }
           document.getElementById('rent_area_end').innerHTML = upper_area_rent_Slider.value;
        };
        
        //===When the lower value slider of rent area is moved.===//
        lower_area_rent_Slider.oninput = function() {
           var lower_area_rent_sliderVal = parseInt(lower_area_rent_Slider.value); //Get lower slider value
           var upper_area_rent_sliderVal = parseInt(upper_area_rent_Slider.value); //Get upper slider value
           
           //If the lower value slider is GREATER THAN the upper value slider minus one.
           if (lower_area_rent_sliderVal > upper_area_rent_sliderVal - 1) {
              //The upper slider value is set to equal the lower value slider plus one.
              lower_area_rent_Slider.value = upper_area_rent_sliderVal - upper_area_rent_sliderVal*(10/100);
              //If the upper value slider equals its set maximum.
              if (upper_area_rent_sliderVal == upper_area_rent_Slider.max) {
                 //Set the lower slider value to equal the upper value slider's maximum value minus one.
                 lower_area_rent_Slider.value = parseInt(upper_area_rent_Slider.max - upper_area_rent_Slider.max*(5/100));
              }
           }
           document.getElementById('rent_area_start').innerHTML = lower_area_rent_Slider.value;
        };
        
        //===When the upper value slider of rent price is moved.===//
        upper_price_rent_Slider.oninput = function() {
            var lower_price_rent_SliderVal = parseInt(lower_price_rent_Slider.value); //Get lower slider value
            var upper_price_rent_SliderVal = parseInt(upper_price_rent_Slider.value); //Get upper slider value
           //If the upper value slider is LESS THAN the lower value slider plus one.
           if (upper_price_rent_SliderVal < lower_price_rent_SliderVal) {
              //The lower slider value is set to equal the upper value slider minus one.
              upper_price_rent_Slider.value = lower_price_rent_SliderVal + lower_price_rent_SliderVal*(10/100);
              //If the lower value slider equals its set minimum.
              if (lower_price_rent_SliderVal == lower_price_rent_Slider.min) {
                 //Set the upper slider value to equal 1.
                 upper_price_rent_Slider.value = 1;
              }
           }
           document.getElementById('rent_price_end').innerHTML = upper_price_rent_Slider.value;
        };
        
        //===When the lower value slider of rent price is moved.===//
        lower_price_rent_Slider.oninput = function() {
           var lower_price_rent_SliderVal = parseInt(lower_price_rent_Slider.value); //Get lower slider value
           var upper_price_rent_SliderVal = parseInt(upper_price_rent_Slider.value); //Get upper slider value
           
           //If the lower value slider is GREATER THAN the upper value slider minus one.
           if (lower_price_rent_SliderVal > upper_price_rent_SliderVal - 1) {
              //The upper slider value is set to equal the lower value slider plus one.
              lower_price_rent_Slider.value = upper_price_rent_SliderVal - upper_price_rent_SliderVal*(10/100);
              
              //If the upper value slider equals its set maximum.
              if (upper_price_rent_SliderVal == upper_price_rent_Slider.max) {
                 //Set the lower slider value to equal the upper value slider's maximum value minus one.
                 lower_price_rent_Slider.value = parseInt(upper_price_rent_Slider.max - upper_price_rent_Slider.max*(5/100));
              }
           }
           document.getElementById('rent_price_start').innerHTML = lower_price_rent_Slider.value;
        };
        
        //===When the upper value slider of sale area is moved.===//
        upper_area_sale_Slider.oninput = function() {
            var lower_area_sale_sliderVal = parseInt(lower_area_sale_Slider.value); //Get lower slider value
            var upper_area_sale_sliderVal = parseInt(upper_area_sale_Slider.value); //Get upper slider value
           //If the upper value slider is LESS THAN the lower value slider plus one.
           if (upper_area_sale_sliderVal < lower_area_sale_sliderVal + 1) {
              //The lower slider value is set to equal the upper value slider minus one.
              upper_area_sale_Slider.value = lower_area_sale_sliderVal + lower_area_sale_sliderVal*(10/100);
              //If the lower value slider equals its set minimum.
              if (lower_area_sale_sliderVal == lower_area_sale_Slider.min) {
                 //Set the upper slider value to equal 1.
                 upper_area_sale_Slider.value = 1;
              }
           }
           document.getElementById('sale_area_end').innerHTML = upper_area_sale_Slider.value;
        };
        
        //===When the lower value slider of sale area is moved.===//
        lower_area_sale_Slider.oninput = function() {
           var lower_area_sale_sliderVal = parseInt(lower_area_sale_Slider.value); //Get lower slider value
           var upper_area_sale_sliderVal = parseInt(upper_area_sale_Slider.value); //Get upper slider value
           
           //If the lower value slider is GREATER THAN the upper value slider minus one.
           if (lower_area_sale_sliderVal > upper_area_sale_sliderVal - 1) {
              //The upper slider value is set to equal the lower value slider plus one.
              lower_area_sale_Slider.value = upper_area_sale_sliderVal - upper_area_sale_sliderVal*(10/100);
              
              //If the upper value slider equals its set maximum.
              if (upper_area_sale_sliderVal == upper_area_sale_Slider.max) {
                 //Set the lower slider value to equal the upper value slider's maximum value minus one.
                 lower_area_sale_Slider.value = parseInt(upper_area_sale_Slider.max - upper_area_sale_Slider.max*(5/100));
              }
           }
           document.getElementById('sale_area_start').innerHTML = lower_area_sale_Slider.value;
        };
        
        //===When the upper value slider of sale price is moved.===//
        upper_price_sale_Slider.oninput = function() {
            var lower_price_sale_sliderVal = parseInt(lower_price_sale_Slider.value); //Get lower slider value
            var upper_price_sale_sliderVal = parseInt(upper_price_sale_Slider.value); //Get upper slider value
           //If the upper value slider is LESS THAN the lower value slider plus one.
           if (upper_price_sale_sliderVal < lower_price_sale_sliderVal + 1) {
              //The lower slider value is set to equal the upper value slider minus one.
              upper_price_sale_Slider.value = lower_price_sale_sliderVal + lower_price_sale_sliderVal*(10/100);
              //If the lower value slider equals its set minimum.
              if (lower_price_sale_sliderVal == lower_price_sale_Slider.min) {
                 //Set the upper slider value to equal 1.
                 upper_price_sale_Slider.value = 1;
              }
           }
           document.getElementById('sale_price_end').innerHTML = upper_price_sale_Slider.value;
        };
        
        //===When the lower value slider of rent area is moved.===//
        lower_price_sale_Slider.oninput = function() {
           var lower_price_sale_sliderVal = parseInt(lower_price_sale_Slider.value); //Get lower slider value
           var upper_price_sale_sliderVal = parseInt(upper_price_sale_Slider.value); //Get upper slider value
           
           //If the lower value slider is GREATER THAN the upper value slider minus one.
           if (lower_price_sale_sliderVal > upper_price_sale_sliderVal - 1) {
              //The upper slider value is set to equal the lower value slider plus one.
              lower_price_sale_Slider.value = upper_price_sale_sliderVal - upper_price_sale_sliderVal*(10/100);
              
              //If the upper value slider equals its set maximum.
              if (upper_price_sale_sliderVal == upper_price_sale_Slider.max) {
                 //Set the lower slider value to equal the upper value slider's maximum value minus one.
                 lower_price_sale_Slider.value = parseInt(upper_price_sale_Slider.max - upper_price_sale_Slider.max*(5/100));
              }
           }
           document.getElementById('sale_price_start').innerHTML = lower_price_sale_Slider.value;
        };
    }
    
    /* filter reset code */
    $(document).on('submit','.resetform',function(){
    	document.getElementsByClassName('filter').reset();
    });
    
    /* index page footer spacing code */
    window.addEventListener('load', function(event){
    	var baseUrl = $("#burl").val();
    	var newWidth = window.innerWidth;
    		if(location.href==baseUrl && newWidth >=1200){
    			document.getElementById("footer-margin").style.paddingTop = "180px";
    		}else{
    			document.getElementById("footer-margin").style = "auto";
    		}
    });
    
    window.addEventListener('resize', function(event){
    	var newWidth = window.innerWidth;
    		if(location.href==baseUrl && newWidth >=1200){
    			document.getElementById("footer-margin").style.paddingTop = "200px";
    		}else{
    			document.getElementById("footer-margin").style = "auto";
    		}
    });
    
    if(window.location.href.indexOf("listings")){
        //window.location.href.indexOf("listings") > -1
      
        var property_data = atob(document.getElementById('property_data').value);
        var parsed_property_data = JSON.parse(property_data);
        var property_coords = '';
        var map = L.map('maps', {
            center: [30,40],
            zoom: 2,
            scrollWheelZoom: false
        });
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            minZoom: 2,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        var markers = L.markerClusterGroup();
        var property_name = '';
        var add_layer = '';
        for(let i = 0; i < parsed_property_data.length; i++){
            var single_property_data = parsed_property_data[i];
            property_coords = single_property_data.gps_cords;
            var laglatValue = property_coords.split(',');
            if(laglatValue[0]!=='' && laglatValue[0]!==undefined && laglatValue[0]!=='' && laglatValue[0]!==undefined){
                property_name = single_property_data.property_name;
                var property_id = single_property_data.id;
                markers.addLayer(L.marker([laglatValue[0],laglatValue[1]]).bindPopup('<a style="font-size:15px" href="'+baseUrl+'listing/'+property_id+'">'+property_name+'</a>'));
            }
        }
        map.addLayer(markers);
    }
    
})(jQuery);

/* Google Translate code */
function googleTranslateElementInit() {
	new google.translate.TranslateElement({ includedLanguages: 'hi,en',}, 'google_translate_element');
}