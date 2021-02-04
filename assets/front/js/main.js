(function ($) {
	"use strict";
    jQuery(document).ready(function($){
        //get bitcoin price
        var currentBTCprice = null;
        $.ajax({
            type:"GET",
            url: 'https://api.coinmarketcap.com/v1/ticker/bitcoin/',
            data:{},
            success:function(data){
                $('#live_price').text('$' + data[0].price_usd);
                currentBTCprice = data[0].price_usd;
            }

        });

        //js code for mobile menu
        $(".menu-toggle").on("click", function() {
            $(this).toggleClass("is-active");
        });

        $(".navbar-collapse>ul>li>a, .navbar-collapse ul.sub-menu>li>a").on("click", function() {
            var element = $(this).parent("li");
            if (element.hasClass("open")) {
                element.removeClass("open");
                element.find("li").removeClass("open");
                element.find("ul").slideUp(500,"linear");
            }
            else {
                element.addClass("open");
                element.children("ul").slideDown();
                element.siblings("li").children("ul").slideUp();
                element.siblings("li").removeClass("open");
                element.siblings("li").find("li").removeClass("open");
                element.siblings("li").find("ul").slideUp();
            }
        });
        
        //live clock update 
        clockUpdate();
        setInterval(clockUpdate, 1000);
        //get current date
        var d = new Date();
        var strDate = d.getDate() + "/" + (d.getMonth() + 1) + "/" + d.getFullYear();
        var todayDate = $('#today_date');
        todayDate.html("<i class='fas fa-calendar-alt'></i> "+strDate);
        //depoit input 
        $(document).on('keyup','#deposit_input',function(){
            var data = $(this).val();
            if (!data){
                $('#deposit_output').text('$' + currentBTCprice);
            }else{
                var value = parseFloat(data) * currentBTCprice;
                setTimeout(function () {
                    $('#deposit_output').text('$' + value.toFixed(2));
                }, 500);
            }
            
        });
        //payout input 
        $(document).on('keyup','#payout_input',function(){
            var data = $(this).val();
            if (!data) {
                $('#payout_output').text('$9578.4534');
            } else {
                var value = parseFloat(data) * 9578.45;
                setTimeout(function () {
                    $('#payout_output').text('$' + value.toFixed(2));
                }, 500);
            }
        });
        /*wow js init*/
        new WOW().init();
        //responsive menu
        var $slickNav = $('#primary-menu');
        $slickNav.slicknav({
            prependTo: '.responsive-menu',
            label: ''
        });
        //magnific popup activation 
        $('.video-play-btn,.video-popup').magnificPopup({
            type: 'video'
        });
        //back to top 
        $(document).on('click', '.back-to-top', function () {
            $("html,body").animate({
                scrollTop: 0
            }, 2000);
        });
        /* counter section activation  */
        var counternumber = $('.count-number');
        counternumber.counterUp({
            delay: 20,
            time: 3000
        });
        //smoth achor effect
        $('#primary-pranto li a').on('click', function (e) {
            e.preventDefault();
            var anchor = $(this).attr('href');
            var pranto = anchor.charAt(0);

            if(pranto == '#') {
                var top = $(anchor).offset().top;
                $('html, body').animate({
                    scrollTop: $(anchor).offset().top
                }, 1000);
                $(this).parent().addClass('active').siblings().removeClass('active');
            }else {
                window.location.href = anchor
            }
        });
        //testimonial carousel
        var $tesitmonialCarousel = $('#testimonial-carousel');
        $tesitmonialCarousel.owlCarousel({
                loop: true,
                autoplay: true,
                autoPlayTimeout: 1000,
                margin:30,
                dots:true,
                nav:false,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    960: {
                        items: 3
                    },
                    1200: {
                        items: 3
                    },
                    1920: {
                        items: 3
                    }
                }
            });
        //team carousel
        var $teamCarousel = $('#team-carousel');
        $teamCarousel.owlCarousel({
                loop: true,
                autoplay: true,
                autoPlayTimeout: 1000,
                margin:30,
                dots:true,
                nav:false,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    960: {
                        items: 3
                    },
                    1200: {
                        items: 3
                    },
                    1920: {
                        items: 3
                    }
                }
            });
        //brand carousel
        var $barandLogoCarousel = $('#logo-carousel-header');
        $barandLogoCarousel.owlCarousel({
                loop: true,
                autoplay: true,
                autoPlayTimeout: 1000,
                margin:30,
                dots:false,
                nav:false,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    960: {
                        items: 4
                    },
                    1200: {
                        items: 5
                    },
                    1920: {
                        items: 5
                    }
                }
            });
        function clockUpdate() {
            var date = new Date();
            function addZero(x) {
                if (x < 10) {
                    return x = '0' + x;
                } else {
                    return x;
                }
            }
            function twelveHour(x) {
                if (x > 12) {
                    return x = x - 12;
                } else if (x == 0) {
                    return x = 12;
                } else {
                    return x;
                }
            }
            var h = addZero(twelveHour(date.getHours()));
            var m = addZero(date.getMinutes());
            var s = addZero(date.getSeconds());

            $('#live_clock').text(h + ':' + m + ':' + s)
        }
    });
    //define variable for store last scrolltop
    var lastScrollTop = '';
    $(window).on('scroll', function () {
        //back to top show/hide
       var ScrollTop = $('.back-to-top');
       if ($(window).scrollTop() > 1000) {
           ScrollTop.fadeIn(1000);
       } else {
           ScrollTop.fadeOut(1000);
       }
       /*--sticky menu activation--*/
        var st = $(this).scrollTop();
        var mainMenuTop = $('.navbar-area');
        if ($(window).scrollTop() > 1000) {
            if (st > lastScrollTop) {
                // hide sticky menu on scrolldown 
                mainMenuTop.removeClass('nav-fixed');
            } else {
                // active sticky menu on scrollup 
                mainMenuTop.addClass('nav-fixed');
            }

        } else {
            mainMenuTop.removeClass('nav-fixed');
        }
        lastScrollTop = st;
       
    });
           
    $(window).on('load',function(){
        //preloader
        var preLoder = $("#preloader");
        preLoder.fadeOut(500);
        var backtoTop = $('.back-to-top')
        backtoTop.fadeOut(100);
    });

}(jQuery));	
