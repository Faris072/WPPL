(function($) {

	"use strict";

	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	$("#mata").click(function() {
        let pass = $('#password');
        if(pass.attr('type') == 'password'){
            pass.attr('type','text');
            $(this).toggleClass("fa-eye fa-eye-slash");
        }
        else{
            pass.attr('type','password');
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

    $("#mata2").click(function() {
        let pass = $('#password2');
        if(pass.attr('type') == 'password'){
            pass.attr('type','text');
            $(this).toggleClass("fa-eye fa-eye-slash");
        }
        else{
            pass.attr('type','password');
            $(this).toggleClass("fa-eye fa-eye-slash");
        }
	});

})(jQuery);
