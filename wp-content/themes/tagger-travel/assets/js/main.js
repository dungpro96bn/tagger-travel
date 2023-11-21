jQuery(function ($) {

    const ua = navigator.userAgent;
    const uaLowerCase = navigator.userAgent.toLowerCase();
    const isSp = ua.indexOf('iPhone') > 0 || ua.indexOf('iPod') > 0 || (ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0);
    const isTablet = ua.indexOf('iPad') > 0 || (ua.indexOf('Android') > 0 && ua.indexOf('Mobile') == -1) || ua.indexOf('A1_07') > 0 || ua.indexOf('SC-01C') > 0 || uaLowerCase.indexOf('macintosh') > 0 && 'ontouchend' in document;
    const isPc = (!isSp && !isTablet);


    // add Class HTML element
    setTimeout((function() {
            document.documentElement.classList.add("is-ready")
        }
    ), 300);

    setTimeout((function() {
            $(".c-charsTitle").attr("data-is-chars-title-playing", "true");
        }
    ), 500);

    // window.onload = function() {
    //
    // };


    AOS.init({
        once: true,
        duration: 1000,
        delay: 0,
    });

    setInterval(function () {
        if($(".wpcf7-form").hasClass("sent")){
            var strHref = window.location.href,
                href = strHref.replace('confirm/', '');
            $(".wpcf7-form").removeClass("sent");
            window.location.replace(href + 'complete/');
        }
    }, 100);

    $(".contact-block .mw_wp_form_confirm .submit-form").click(function () {
        localStorage.setItem('sendmail', 'complete');
    });

    $(".page-privacy-policy .footer__navSub__item a, .page-privacy-policy #navList-menu .menu-item a, .page-privacy-policy #header-menu .header-nav .contact-action a").click(function (event) {
        event.preventDefault();
        var url = $(this).attr('href');
        localStorage.setItem('clickLink', url);
        var strHref = window.location.href,
            href = strHref.replace('privacy-policy/', '');
        window.location.replace(href);
    });

    $(document).ready(function () {
        var checkClick = localStorage.getItem('clickLink');
        if(checkClick){
            var dest = checkClick.split('#');
            var target = dest[1];
            var target_offset = $('#'+target).offset();
            var target_top = target_offset.top - 70;
            $('html, body').animate({scrollTop:target_top}, 0, 'swing');
            setTimeout((function() {
                    localStorage.removeItem('clickLink');
                }
            ), 3000);
        }
    });

    //scroll
    $(function(){
        $('.scroll').click(function(event){event.preventDefault();
            var url = $(this).attr('href');
            var dest = url.split('#');var target = dest[1];
            var target_offset = $('#'+target).offset();
            var target_top = target_offset.top;
            $('html, body').animate({scrollTop:target_top}, 500, 'swing');
            return false;
        });
        $('#navList-menu .menu-item a, .scroll-bottom').click(function(event){event.preventDefault();
            var url = $(this).attr('href');
            var dest = url.split('#');var target = dest[1];
            var target_offset = $('#'+target).offset();
            var target_top = target_offset.top - 70;
            $('html, body').animate({scrollTop:target_top}, 500, 'swing');
            return false;
        });
    });

    // page-top
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('#page-top').addClass('is-open');
        } else {
            $('#page-top').removeClass('is-open');
        }
    });

    if ($(this).scrollTop() > 200) {
        $('#page-top').addClass('is-open');
    } else {
        $('#page-top').removeClass('is-open');
    }

    //Scroll page top
    $('#page-top a').click(function(event){
        event.preventDefault();
        var speed = 500;
        var href= $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top;
        $("html, body").animate({scrollTop:position}, speed, "swing");
        return false;
    });

    //Open Menu
    $("#header-menu .btn-openMenu").click(function () {
        $("body").toggleClass("header-open");
        $("#header-menu .header-megamenu").toggleClass("is-open");
        $(this).toggleClass("is-open");
        $("#header-menu").toggleClass("is-openMenu");
    });

    $(".bg-headerOpen").click(function () {
        $("body").toggleClass("header-open");
        $("#header-menu .header-megamenu").toggleClass("is-open");
        $("#header-menu").toggleClass("is-openMenu");
        $("#header-menu .btn-openMenu").toggleClass("is-open");
    });


    // Scroll header
    $(window).scroll( function(){
        if( $(this).scrollTop() > 200 ){
            $('#header-menu .header-nav').addClass('scroll-header');
            setTimeout(function(){
                $('#header-menu .header-nav').addClass('site-header--opening');
            },100);
        } else {
            $('#header-menu .header-nav').removeClass('scroll-header');
            $('#header-menu .header-nav').removeClass('site-header--opening');
        }
    });
    if($(this).scrollTop() > 200 ){
        $('#header-menu .header-nav').addClass('scroll-header');
        setTimeout(function(){
            $('#header-menu .header-nav').addClass('site-header--opening');
        },100);
    } else {
        $('#header-menu .header-nav').removeClass('scroll-header');
        $('#header-menu .header-nav').removeClass('site-header--opening');
    }

    var isMobileVersion = document.getElementsByClassName('error');
    if (isMobileVersion.length > 0) {
        var scroll = $('.contact-block').offset();
        var target_top = scroll.top - 50;
        $('html, body').animate({scrollTop: target_top}, 0, 'swing');
    }

    var checkConfirm = document.getElementsByClassName('mw_wp_form_confirm');
    if (checkConfirm.length > 0) {
        var scroll = $('.contact-block').offset();
        var target_top = scroll.top - 50;
        $('html, body').animate({scrollTop: target_top}, 0, 'swing');
    }

    var checkConfirm = document.getElementsByClassName('complete-message');
    if (checkConfirm.length > 0) {
        var scroll = $('.contact-block').offset();
        var target_top = scroll.top - 50;
        $('html, body').animate({scrollTop: target_top}, 0, 'swing');
    }

    $(".contact-block .form-bottom .btn-form input").click(function () {
        localStorage.setItem('backForm', 'YES');
    });

    var submitBack = localStorage.getItem('backForm');
    if (submitBack == "YES") {
        var scroll = $('.contact-block').offset();
        var target_top = scroll.top - 50;
        $('html, body').animate({scrollTop: target_top}, 0, 'swing');
    }

    $(document).ready(function () {
        var checkItem = document.getElementsByClassName('mw_wp_form_complete');
        if(checkItem.length <= 0){
            localStorage.removeItem('sendmail');
        }

        var checkHome = document.getElementsByClassName('home');
        if(checkHome.length <= 0){
            localStorage.removeItem("backForm");
        }
    });

    $(".backHome a").click(function () {
        localStorage.removeItem('sendmail');
        localStorage.removeItem("backForm");
    });


});