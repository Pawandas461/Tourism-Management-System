function emial_pop(){
    $('.email_verify').css('display', 'block');
	$('.popup').css('display', 'none');
    $('.login-popup').css('display', 'none');
}
function email_cancel() {
    $('.email_verify').css('display', 'none');
}

function sign_pop() {
    $('.popup').css('display', 'block');
    $('.email_verify').css('display', 'none');
    $('.login-popup').css('display', 'none');
}

function sign_close() {
    $('.popup').css('display', 'none');
}

function login_popup(){
    $('.login-popup').css('display', 'block');
    $('.email_verify').css('display', 'none');
    $('.popup').css('display', 'none');
}

function login_close() {
    $('.login-popup').css('display', 'none');
}

function go_back(){
    window.history.back();
}
function send_message() {
	var name = jQuery("#name").val();
	var email = jQuery("#email").val();
	var mobile = jQuery("#mobile").val();
	var message = jQuery("#message").val();

	if (name == "") {
		alert('Please enter name');
	} else if (email == "") {
		alert('Please enter email');
	} else if (mobile == "") {
		alert('Please enter mobile');
	} else if (message == "") {
		alert('Please enter message');
	} else {
		jQuery.ajax({
			url: 'send_message.php',
			type: 'post',
			data: 'name=' + name + '&email=' + email + '&mobile=' + mobile + '&message=' + message,
			success: function (result) {
				alert(result);
			}
		});
	}
}

function user_register() {
	jQuery('.field_error').html('');
	var name = jQuery("#name").val();
	var email = jQuery("#email").val();
	var mobile = jQuery("#mobile").val();
	var password = jQuery("#password").val();
	var is_error = '';
	if (name == "") {
		jQuery('#name_error').html('Please enter name');
		is_error = 'yes';
	} if (email == "") {
		jQuery('#email_error').html('Please enter email');
		is_error = 'yes';
	} if (mobile == "") {
		jQuery('#mobile_error').html('Please enter mobile');
		is_error = 'yes';
	} if (password == "") {
		jQuery('#password_error').html('Please enter password');
		is_error = 'yes';
	}
	if (is_error == '') {
		jQuery.ajax({
			url: 'register_submit.php',
			type: 'post',
			data: 'name=' + name + '&email=' + email + '&mobile=' + mobile + '&password=' + password,
			success: function (result) {
				if (result == 'email_present') {
					jQuery('#email_error').html('Email id already present');
				}
				if (result == 'insert') {
					jQuery('.register_msg p').html('You are successfully registered');
				}
			}
		});
	}

}


function user_login() {
	jQuery('.field_error').html('');
	var email = jQuery("#login_email").val();
	var password = jQuery("#login_password").val();
	var is_error = '';
	if (email == "") {
		jQuery('#login_email_error').html('Please enter email');
		is_error = 'yes';
	} if (password == "") {
		jQuery('#login_password_error').html('Please enter password');
		is_error = 'yes';
	}
	if (is_error == '') {
		jQuery.ajax({
			url: 'login_submit.php',
			type: 'post',
			data: 'email=' + email + '&password=' + password,
			success: function (result) {
				result = result.trim();
				if (result == 'wrong') {
					jQuery('.login_msg p').html('Please enter valid login details');
				}
				if (result == 'valid') {
					window.location.href = window.location.href;
				}
			}
		});
	}
}

$(window).scroll(function () {
	if ($(this).scrollTop() > 100) {
		$('.back-to-top').fadeIn('slow');
	} else {
		$('.back-to-top').fadeOut('slow');
	}
});
$('.back-to-top').click(function () {
	$('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
	return false;
});