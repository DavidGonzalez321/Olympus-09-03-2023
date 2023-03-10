(function($) {
    "use strict";
    jQuery.noConflict();
    //when dom is ready
    $(document).ready(function(){

        // on scroll event start
        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 55) {
                $('#back-to-top').addClass('reveal');
            } else {
                $('#back-to-top').removeClass('reveal');
            }
        });
        // on scroll event end

    	// revolution slider start
    	$("#rev_slider_1").show().revolution({
    		sliderType:"standard",
    		sliderLayout:"fullscreen",
    		dottedOverlay:"none",
    		delay:9000,
    		spinner: "spinner4",
    		navigation: {
    			keyboardNavigation:"off",
    			keyboard_direction: "horizontal",
    			mouseScrollNavigation:"off",
    			onHoverStop:"off",
    			touch:{
    				touchenabled:"on",
    				swipe_threshold: 75,
    				swipe_min_touches: 1,
    				swipe_direction: "horizontal",
    				drag_block_vertical: false
    			},
    			arrows: {
    				enable: true,
    				style: 'metis',
    				tmp: '',
    				rtl: false,
    				hide_onleave: true,
    				hide_onmobile: true,
    				hide_under: 0,
    				hide_over: 9999,
    				hide_delay: 200,
    				hide_delay_mobile: 1200,
    				left: {
    					container: 'slider',
    					h_align: 'left',
    					v_align: 'center',
    					h_offset: 20,
    					v_offset: 0
    				},
    				right: {
    					container: 'slider',
    					h_align: 'right',
    					v_align: 'center',
    					h_offset: 20,
    					v_offset: 0
    				}
    			},
    		},
    		responsiveLevels:[1240,1024,778,480],
    		gridwidth:[1240,1024,778,480],
    		gridheight:[868,768,960,720],
    		lazyType:"none",
    		shadow:0,
    		shuffle:"off",
    		autoHeight:"off",
    	});
    	// revolution slider end

    	// feedback-carousel start
		$(".feedback-carousel").owlCarousel({
            singleItem: true,
        });
        $(".p-carousel").owlCarousel({
            items: 4
        });
    	// feedback-carousel end

    	// animated counter start
    	$('.counter-box').appear(function(){
            var datacount = $(this).attr('data-count');
            $(this).find('.counter').delay(6000).countTo({
                from: 0,
                to: datacount,
                speed: 5000,
                refreshInterval: 50,
            });
        });
    	// animated counter end

        // bootstrap accordion start
        $('#accordion1').collapse();
        // bootstrap accordion end

        // dropdown menu on mouse hover start
        $(".dropdown").on('mouseenter',function() {
            $('.nav > .dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).show("400");
            $(this).addClass('open');
        }).on('mouseleave', function() {
            $('.nav > .dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).hide("400");
            $(this).removeClass('open');
        });
        // dropdown menu on mouse hover end

        // back to top start
        $('#back-to-top').on('click', function(){
            $("html, body").animate({scrollTop: 0}, 500);
            return false;
        });
        // back to top end

    });
    //dom ready end

})(jQuery);