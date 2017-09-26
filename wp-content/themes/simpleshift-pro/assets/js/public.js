jQuery(window).bind("scroll", function() {
    if (jQuery(this).scrollTop() > 200) {
        jQuery('.navbar,.dropdown-menu').css({ "background": "#000" });
        jQuery('.navbar-default .navbar-nav>li>a,.fallback_cb>ul>li>a,.navbar-default .navbar-brand,.dropdown-menu li a').css({ "color": "#fff" });
        jQuery('.navbar-default .navbar-nav>li.active>a').css({"border-color": "#fff"});
        jQuery('.navbar-default .navbar-nav>.dropdown>a .caret,.navbar-default .navbar-nav>.dropdown>a:hover .caret,.navbar-default .navbar-nav>.open>a .caret, .navbar-default .navbar-nav>.open>a:hover .caret, .navbar-default .navbar-nav>.open>a:focus .caret,.navbar-default .navbar-nav>.dropdown>a:hover .caret, .navbar-default .navbar-nav>.dropdown>a:focus .caret').css({"border-top-color": "#fff","border-bottom-color": "#fff"});

    } else {
        jQuery('.navbar,.dropdown-menu').css({ "background": "rgba(0, 0, 0, .3)" });
        jQuery('.navbar-default .navbar-nav>li>a,.fallback_cb>ul>li>a,.navbar-default .navbar-brand,.dropdown-menu li a').css({ "color": "#fff" });
        jQuery('.navbar-default .navbar-nav>li.active>a').css({"border-color": "transparent"});
        jQuery('.navbar-default .navbar-nav>.dropdown>a .caret,.navbar-default .navbar-nav>.dropdown>a:hover .caret,.navbar-default .navbar-nav>.open>a .caret, .navbar-default .navbar-nav>.open>a:hover .caret, .navbar-default .navbar-nav>.open>a:focus .caret,.navbar-default .navbar-nav>.dropdown>a:hover .caret, .navbar-default .navbar-nav>.dropdown>a:focus .caret').css({"border-top-color": "#ffffff","border-bottom-color": "#ffffff"});
    }
});


jQuery(document).ready(function($) {
    
    var windowheight = jQuery(window).height();
    var bannerheight = jQuery('.frontpage-banner').height();
    var subpagebannerheight = jQuery('.subpage-banner').height();
    var bannerpadding = ((windowheight-bannerheight)/3);
    if (bannerpadding < 100) {
        bannerpadding = 100;
    }
    var subbannerpadding = ((windowheight-subpagebannerheight)/6);
    if (subbannerpadding < 100) {
        subbannerpadding = 100;
    }
	var navbarheight = jQuery('.navbar').height();
	var navbarnavheight = jQuery('.navbar-nav').height();
	var navbarwithimglogopadding = ((navbarheight-navbarnavheight)/2);
    jQuery('.frontpage-banner').css({ "padding-top": bannerpadding+navbarheight });
    jQuery('.frontpage-banner').css({ "padding-bottom": bannerpadding });
    jQuery('.subpage-banner').css({ "padding-top": subbannerpadding+navbarheight });
    jQuery('.subpage-banner').css({ "padding-bottom": subbannerpadding });
    jQuery('.hasimglogo .nav.navbar-nav, .hasimglogo #social_buttons').css({ "padding-top": navbarwithimglogopadding });
    jQuery('.hasimglogo .nav.navbar-nav, .hasimglogo #social_buttons').css({ "padding-bottom": navbarwithimglogopadding });
    
    jQuery("html").niceScroll({
		cursorcolor: "#1a1a1a",
		cursorborder: "#1a1a1a",
		cursoropacitymin: 0.2,
		cursorwidth: 8,
		zindex: 10,
		scrollspeed: 60,
		mousescrollstep: 40
	});
		
	
	jQuery('body').scrollspy({ 
		target: '.navbar-collapse',
	    offset: 0
	});

	window.sr = new scrollReveal();
	
	jQuery('a.scrolltrue').bind('click', function(event) {
    	event.preventDefault();
        var $href = jQuery(this);
        jQuery('html, body').stop().animate({
            scrollTop: jQuery($href.attr('href')).offset().top
        }, 1000, 'easeInOutQuad');
        jQuery('.navbar-collapse').collapse('hide');
    });	
    

});