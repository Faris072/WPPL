(function($) {

	"use strict";

	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	$('#mata').on('click',function() {
        if($('#password').attr('type') == 'password'){
            $('#password').attr('type','text');
            $(this).toggleClass("fa-eye fa-eye-slash");
        }
        else{
            $('#password').attr('type','password');
            $(this).toggleClass("fa-eye fa-eye-slash");
        }
	//   $(this).toggleClass("fa-eye fa-eye-slash");
	//   var input = $($(this).attr("toggle"));
	//   if (input.attr("type") == "password") {
	//     input.attr("type", "text");
	//   } else {
	//     input.attr("type", "password");
	//   }
	});

    $('#mata2').on('click', function (){
        if($('#password2').attr('type') == 'password'){
            $('#password2').attr('type','text');
            $(this).toggleClass("fa-eye fa-eye-slash");
        }
        else{
            $('#password2').attr('type','password');
            $(this).toggleClass("fa-eye fa-eye-slash");
        }
    });

})(jQuery);
