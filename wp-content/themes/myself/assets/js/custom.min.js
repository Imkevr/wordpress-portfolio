jQuery(document).ready(function($) {

/*------------------------------------------------
            DECLARATIONS
------------------------------------------------*/

    var scroll              = $(window).scrollTop();  
    var scrollup            = $('.backtotop');
    var menu_toggle         = $('.menu-toggle');
    var dropdown_toggle     = $('button.dropdown-toggle');
    var nav_menu            = $('.main-navigation');
    var featured_profile    = $('.profile-slider');
    var working_experience_slider  = $('.working-experience-slider');
    var testimonial_slider  = $('.testimonial-slider');
    var masonry_gallery = $('.grid');

/*------------------------------------------------
            BACK TO TOP
------------------------------------------------*/

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            scrollup.css({bottom:"25px"});
        } 
        else {
            scrollup.css({bottom:"-100px"});
        }
    });

    scrollup.click(function() {
        $('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });

/*------------------------------------------------
            MAIN NAVIGATION
------------------------------------------------*/

    menu_toggle.click(function(){
        nav_menu.slideToggle();
        $(this).toggleClass('active');
        $('.menu-overlay').toggleClass('active');
        $('.main-navigation').toggleClass('menu-open');
        $('body').toggleClass('main-navigation-active');
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            $('.menu-sticky #masthead').addClass('nav-shrink');
        }
        else {
            $('.menu-sticky #masthead').removeClass('nav-shrink');
        }
    });

    dropdown_toggle.click(function() {
        $(this).toggleClass('active');
       $(this).parent().find('.sub-menu').first().slideToggle();
    });

/*------------------------------------------------
            Sliders
------------------------------------------------*/

featured_profile.slick({
    responsive: [
    {
        breakpoint: 767,
        settings: {
            slidesToShow: 1
        }
    }
    ]
});

working_experience_slider.slick({
    responsive: [
    {
    breakpoint: 1200,
        settings: {
            slidesToShow: 3,
            arrows: false
        }
    },
    {
        breakpoint: 767,
            settings: {
            slidesToShow: 2,
            arrows: false
        }
    },
    {
        breakpoint: 567,
            settings: {
            slidesToShow: 1,
            arrows: false
        }
    }
    ]
});

testimonial_slider.slick({
    responsive: [
    {
    breakpoint: 992,
        settings: {
            slidesToShow: 1,
            centerMode: false,
            arrows: false
        }
    }
    ]
});

/*------------------------------------------------
                Tabs
------------------------------------------------*/

$('ul.tabs li').click(function(event) {
    event.preventDefault();

    var tab_id = $(this).attr('data-tab');

    $('ul.tabs li').removeClass('active');
    $('.tab-content').removeClass('active');
    $('.tab-content').fadeOut();
    $(this).addClass('active');
    $("#"+tab_id).fadeIn();

});

/*------------------------------------------------
            MASONRY GALLERY
------------------------------------------------*/

masonry_gallery.imagesLoaded( function() {
    masonry_gallery.packery({
        itemSelector: '.grid-item'
    });
});

/*------------------------------------------------
            SKILLS
------------------------------------------------*/
$('.skill-item').each(function(){
    $(this).find('.skillbar-inner').animate({
        width:$(this).attr('data-percent')
    },2000);
});

/*------------------------------------------------
            MATCH HEIGHT
------------------------------------------------*/
$('#latest-posts article').matchHeight();
$('.working-experience-slider .entry-container').matchHeight();

/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});