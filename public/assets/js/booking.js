(function($) {
    $('#book-date').datepicker();

    $(document).ready(function(){
        $("#booking-form").validator().on("submit", function (event) {
            if (event.isDefaultPrevented()) {
            // handle the invalid form...
            formError();
            submitMSG(false, "All fields are required");
        } else {
            // everything looks good!
            event.preventDefault();
            submitForm();
        }
        });
    });

    function submitForm(){
        var bDate       = $( "#book-date" ).val();
        var bTime       = $( "#book-time" ).val();
        var bService    = $( "#book-service" ).val();
        var bStylist    = $( "#book-stylist" ).val();
        var bName       = $( "#book-name" ).val();
        var bPhone      = $( "#book-phone" ).val();
        var bEmail      = $( "#book-email" ).val();



        $.ajax({
            type: "POST",

            url: "assets/php/booking-form.php",

            data: "bDate=" + bDate + "&bTime=" + bTime + "&bService=" + bService + "&bStylist=" + bStylist + "&bName=" + bName + "&bPhone=" + bPhone + "&bEmail=" + bEmail,
                
            success : function(text){
                if (text == "success"){
                    formSuccess();
                } else {
                    formError();
                    submitMSG(false,text);
                }
            }
        });
    }

    function formSuccess(){
        $("#booking-form")[0].reset();
        submitMSG(true, "Booking Received!")
    }

    function formError(){
        $("#booking-form").removeClass().addClass('booking-form shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            $(this).removeClass();
        });
    }

    function submitMSG(valid, msg){
        if(valid){
            var msgClasses = "animated text-center alert alert-success mt15";
        } else {
            var msgClasses = "text-center alert alert-danger mt15";
        }
        $("#msgalert").removeClass().addClass(msgClasses).text(msg);
    }
})(jQuery);
