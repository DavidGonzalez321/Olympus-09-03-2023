(function($) {
    $(document).ready(function(){
        $("#contact-form").validator().on("submit", function (event) {
            if (event.isDefaultPrevented()) {
            // handle the invalid form...
            formError();
            submitMSG(false, "Fill the form properly. ");
        } else {
            // everything looks good!
            event.preventDefault();
            submitForm();
        }
        });
    });

    function submitForm(){
        var name        = $("#name").val();
        var email       = $("#email").val();
        var msg_subject = $("#msg_subject").val();
        var message     = $("#message").val();


        $.ajax({
            type: "POST",
            url: "assets/php/contact-form.php",
            data: "name=" + name + "&email=" + email + "&msg_subject=" + msg_subject + "&message=" + message,
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
        $("#contact-form")[0].reset();
        submitMSG(true, "Message Submitted!")
    }

    function formError(){
        $("#contact-form").removeClass().addClass('booking-form shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
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
