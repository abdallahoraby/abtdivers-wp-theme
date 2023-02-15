
$(document).ready(function () {
    if ($(window).width() > 991){
        $('.navbar-light .d-menu').hover(function () {
            $(this).find('.sm-menu').first().stop(true, true).slideDown(150);
        }, function () {
            $(this).find('.sm-menu').first().stop(true, true).delay(120).slideUp(100);
        });
    }


    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        //>=, not <=
        if (scroll >= 300) {
            //clearHeader, not clearheader - caps H
            $("nav.navbar").addClass("fixed-nav");
        } else {
            $("nav.navbar").removeClass("fixed-nav");
        }
    }); //missing );

    $('li.get_gallery_items:first-child').addClass('selected');

    $('li.get_gallery_items').on('click', function(){

        $(this).addClass('selected');
        $('li.get_gallery_items').not(this).removeClass('selected');

    });

    $('.select2').select2();

    $('.dive-site-gallery .carousel-item').eq(0).addClass('active')


    window_width = $(window).width();

    nav_toggle = $('nav').hasClass('navbar-offcanvas') ? true : false;

    // <a href="https://www.jqueryscript.net/tags.php?/Responsive/">Responsive</a> checks
    if (window_width < 992 || nav_toggle) {
        offCanvas.initSideNav();
    }

    // Close the sidebar if the user clicks a link or a dropdown-item,
    // and close the sidebar
    $('.nav-link:not(.dropdown-toggle), .dropdown-item').on('click', function () {
        var $toggle = $('.navbar-toggler');

        $('html').removeClass('nav-open');
        offCanvas.sidenav.sidenav_visible = 0;
        setTimeout(function () {
            $toggle.removeClass('toggled');
        }, 300);
    });

    $(window).resize(function () {
        window_width = $(window).width();

        // More responsive checks if the user resize the browser
        if (window_width < 992) {
            offCanvas.initSideNav();
        }

        if (window_width > 992 && !nav_toggle) {
            $('nav').removeClass('navbar-offcanvas');
            offCanvas.sidenav.sidenav_visible = 1;
            navbar_initialized = false;
        }
    });

    $('a.nav-link.dropdown-toggle i').on('click', function(){

        $(this).parent().next().slideToggle();

    });

    new WOW().init();



}); // end of document ready function

$(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});


// $(".courses_category").click(function(){
//     let courses_category = $(this).data('course-category-id');
//     $.ajax({
//         type: 'POST',
//         url: my_ajax_object.ajax_url,
//         data: {
//             action : 'get_courses_categories',
//             courses_category : courses_category
//         },
//         success: function(response){
//             $( '.courses_categories_section' ).html( response );
//         },
//         error: function(MLHttpRequest, response, errorThrown){
//             alert(errorThrown);
//         }
//     });
// });

$(".get_gallery_items").click(function(){
    let gallery_post_id = $(this).data('gallery-post-id');
    $.ajax({
        type: 'POST',
        url: my_ajax_object.ajax_url,
        data: {
            action : 'get_gallery_items',
            gallery_post_id : gallery_post_id
        },
        success: function(response){
            $( '.gallery-result' ).html( response );
        },
        error: function(MLHttpRequest, response, errorThrown){
            alert(errorThrown);
        }
    });
});




$('.owl-carousel.home-courses').owlCarousel({
    loop:true,
    margin:30,
    nav: true,
    navText: ['<a class="course-one__carousel-btn-left"><i class="fa fa-angle-left"></i></a>','<a class="course-one__carousel-btn-right"><i class="fa fa-angle-right"></i></a>'],
    dots: false,
    navElement: '<div class="course-one__carousel-btn__wrapper"></div>',
    autoplay: true,
    autoplayTimeout: 2000,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:2,
        },
        1000:{
            items:3,
        }
    }
});

$('.testimonials-carousal').owlCarousel({
    loop:true,
    margin:30,
    nav: true,
    pagination: true,
    navText: ['<a class="course-one__carousel-btn-left"><i class="fa fa-angle-left"></i></a>','<a class="course-one__carousel-btn-right"><i class="fa fa-angle-right"></i></a>'],
    dots: true,
    navElement: '<div class="course-one__carousel-btn__wrapper"></div>',
    autoplay: true,
    autoplayTimeout: 2000,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:2,
        },
        1000:{
            items:3,
        }
    }
});


$('.the-center-home').owlCarousel({
    items: 1,
    loop:true,
    center: true,
    nav: false,
    dots: true,
    autoplay: true,
    autoplayTimeout: 5000,
});

$('.home-blog').owlCarousel({
    items: 1,
    loop:true,
    center: true,
    nav: false,
    dots: true,
    autoplay: true,
    autoplayTimeout: 7000,
});

var window_height;
var window_width;
var navbar_initialized = false;
var nav_toggle;

var offCanvas = {
    sidenav: {
        // Sidenav is not visible by default.
        // Change to 1 if necessary
        sidenav_visible: 0
    },
    initSideNav: function initSideNav() {
        if (!navbar_initialized) {
            var $nav = $('nav');

            // Add the offcanvas class to the navbar if it's not initialized
            $nav.addClass('navbar-offcanvas');

            // Clone relevant navbars
            var $navtop = $nav.find('.navbar-top').first().clone(true);
            var $navbar = $nav.find('.navbar-collapse').first().clone(true);

            // Let's start with some empty vars
            var ul_content = '';
            var top_content = '';

            // Set min-height of the new sidebar to the screen height
            $navbar.css('min-height', window.screen.height);

            // Take the content of .navbar-top
            $navtop.each(function() {
                var navtop_content = $(this).html();
                top_content = top_content + navtop_content;
            });

            // Take the content of .navbar-collapse
            $navbar.children('ul').each(function() {
                var nav_content = $(this).html();
                ul_content = ul_content + nav_content;
            });

            // Wrap the new content inside an <ul>
            // ul_content = '<ul class="navbar-nav sidebar-nav">' + ul_content + '</ul>';
            ul_content = $('.menu-content').html();

            // Insert the html content into our cloned content
            $navbar.html(ul_content);
            $navtop.html(top_content);

            // Append the navbar to body,
            // and insert the content of the navicons navbar just below the logo/nav-image
            $('body').append($navbar);
            $('.nav-image').after($navtop);


            // Set the toggle-variable to the Bootstrap navbar-toggler button
            var $toggle = $('.navbar-toggler');

            // Add/remove classes on toggle and set the visiblity of the sidenav,
            // and append the overlay. Also if the user clicks the overlay,
            // the sidebar will close
            $toggle.on('click', function () {
                if (offCanvas.sidenav.sidenav_visible == 1) {
                    $('html').removeClass('nav-open');
                    offCanvas.sidenav.sidenav_visible = 0;
                    $('#overlay').remove();
                    setTimeout(function() {
                        $toggle.removeClass('toggled');
                    }, 300);
                } else {
                    setTimeout(function() {
                        $toggle.addClass('toggled');
                    }, 300);

                    // Add the overlay and make it close the sidenav on click
                    var div = '<div id="overlay"> <i class="far fa-times-circle"></i> </div>';
                    $(div).appendTo("body").on('click', function() {
                        $('html').removeClass('nav-open');
                        offCanvas.sidenav.sidenav_visible = 0;
                        $('#overlay').remove();
                        setTimeout(function() {
                            $toggle.removeClass('toggled');
                        }, 300);
                    });

                    $('html').addClass('nav-open');
                    offCanvas.sidenav.sidenav_visible = 1;
                }
            });
            // Set navbar to initialized
            navbar_initialized = true;
        }
    }
};