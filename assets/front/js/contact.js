
(function ($) {
    "use strict";
    jQuery(document).ready(function ($) {
        $(document).on('submit','#contact_form',function(e){
            e.preventDefault();
            var username = $('#username').val();
            var phone_number = $('#phone_number').val();
            var user_email = $('#user_email').val();
            var subject = $('#subject').val();
            var message = $('#message').val();

            if (!username) {
                $('#username').parent().removeClass('error').parent().children('.error-show').remove();
                $('#username').parent().addClass('error').parent().append(' <span class="text text-danger error-show"> Please enter your name</span>')
            }else{
                $('#username').parent().removeClass('error').parent().children('.error-show').remove();
            }
            if (!phone_number) {
                $('#phone_number').parent().removeClass('error').parent().children('.error-show').remove();
                $('#phone_number').parent().addClass('error').parent().append(' <span class="text text-danger error-show"> Please enter your phone number</span>')
            }else{
                $('#phone_number').parent().removeClass('error').parent().children('.error-show').remove();
            }
            if (!user_email) {
                $('#user_email').parent().removeClass('error').parent().children('.error-show').remove();
                $('#user_email').parent().addClass('error').parent().append(' <span class="text text-danger error-show"> Please enter your email</span>')
            }else{
                $('#user_email').parent().removeClass('error').parent().children('.error-show').remove();
            }
            if (!subject) {
                $('#subject').parent().removeClass('error').parent().children('.error-show').remove();
                $('#subject').parent().addClass('error').parent().append(' <span class="text text-danger error-show"> Please enter your subject</span>')
            }else{
                $('#subject').parent().removeClass('error').parent().children('.error-show').remove();
            }
            if (!message ) {
                $('#message').parent().removeClass('error').parent().children('.error-show').remove();
                $('#message').parent().addClass('error').parent().append(' <span class="text text-danger error-show"> Please enter your message</span>')
            }else{
                $('#message').parent().removeClass('error').parent().children('.error-show').remove();
            }
            
            if ( username && phone_number && user_email && subject && message ) {
            	$.ajax({
	                type: "POST",
	                url:'contact.php',
	                data:{
	                    'username': username,
	                    'phone_number': phone_number,
	                    'user_email': user_email,
	                    'subject': subject,
	                    'message': message
	                },
	                success:function(data){
	                    $('#contact_form').children('.email-success').remove();
	                    $('#contact_form').prepend('<span class="alert alert-success email-success">'+data+'</span>');
	                    $('#username').val('');
			            $('#phone_number').val('');
			          	$('#user_email').val('');
				        $('#subject').val('');
				        $('#message').val('');

	                },
	                error:function(res){

	                }
	            })
            }else{
            	 $('#contact_form').children('.email-success').remove();
            	 $('#contact_form').prepend('<span class="alert alert-danger email-success">somenthing is wrong</span>');
            	console.log('somenthing is wrong')
            }

            
            
        });
    })

}(jQuery));	
