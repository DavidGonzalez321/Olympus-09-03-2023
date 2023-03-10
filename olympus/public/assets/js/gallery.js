(function($) {
    "use strict";

    //when dom is ready
    $(document).ready(function(){

        //gallery start
        $('.gallery-item').magnificPopup({
            type: 'image',
            mainClass: 'mfp-with-zoom',
            gallery:{
                enabled:true
            },
            zoom: {
                enabled: true,
                duration: 300,
                easing: 'ease-in-out',
                opener: function(openerElement) {
                    return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
            }
        });
        //gallery end

    });
    //dom ready end

})(jQuery);