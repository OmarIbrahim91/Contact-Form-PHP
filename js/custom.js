/* global $ , alert , console  */

$(function (){

	'use strict';

	var formError = true; // settings Error Status

	 function checkError(){
	 	if (formError === true) {
	 		console.log('Error Form')
	 	}else{
	 		console.log('Valid Form')
	 	}
	 }

	checkError();
	$('.username').blur(function (){

		if ($(this).val().length < 4) { // show errors

			$(this).css('border', '1px solid #F00');
			
			$(this).parent().find('.custom-alert').fadeIn(300);

			$(this).parent().find('.asterisx').fadeIn(100);

			formError = true;

		}else{ // no errors
			$(this).parent().find('.custom-alert').fadeOut(200);
			$(this).css('border', '1px solid #080');
			$(this).parent().find('.asterisx').fadeOut(100);

			formError = false;
		}
	});

	$('.email').blur(function (){

		if ($(this).val() === '') {

			$(this).css('border', '1px solid #F00');
			
			$(this).parent().find('.custom-alert').fadeIn(300);

			$(this).parent().find('.asterisx').fadeIn(100);

			formError = true;

		}else{
			$(this).parent().find('.custom-alert').fadeOut(200);
			$(this).css('border', '1px solid #080');
			$(this).parent().find('.asterisx').fadeOut(100);

			formError = false;
		}

	});

	$('.msg').blur(function (){

		if ($(this).val().length < 10) {

			$(this).css('border', '1px solid #F00');
			
			$(this).parent().find('.custom-alert').fadeIn(300);

			$(this).parent().find('.asterisx').fadeIn(100);

			formError = true;

		}else{
			$(this).parent().find('.custom-alert').fadeOut(200);
			$(this).parent().find('.asterisx').fadeOut(100);

			formError = false;
		}

	});

	$('.contact-form').submit(function(e){

		if (formError === true){

			e.preventDefault();

			$('.username, .email, .msg').blur();

		}

	});

});