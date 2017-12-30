function formFails(form, data) {
	// show error message
	form.addClass('event-signup--failed');
	data.messages.forEach(function(message){
		var errorMessage = $('<div>');
		errorMessage.addClass('event-signup__message event-signup__message--failed');
		errorMessage.html(message);
		form.prepend(errorMessage);
	});
	fbq('track', 'CompleteRegistration', {
		status: 'failed'
	});
	form.removeClass('event-signup--sending');

}

function formSucceeds(form, data) {
	// Reveal the message that sending was succesful
	var successMessage = $('<div>');
	successMessage.addClass('event-signup__message event-signup__message--success');
	successMessage.html(data.messages);
	form.prepend(successMessage);
	form.addClass('event-signup--success');
	form.removeClass('event-signup--sending');
	fbq('track', 'CompleteRegistration', {
		status: 'success'
	});
}

function formhandling() {

	$(document).on('submit' , 'form.event-signup', function(e) {

		e.preventDefault();

		var form = $(this);
		var data = new FormData(form[0]);

		form.addClass('event-signup--sending');

		// send the request to the server
		$.ajax({
			url: wpjs_object.ajaxurl,
			type: 'POST',
			dataType: 'JSON',
			data: data,
			processData: false,
			contentType: false,
			success: function(data) {
				if (data['success'] === false) {
					formFails(form, data);
				} else {
					formSucceeds(form, data);
				}
			},
			error: function(data) {
				formFails(form, data);
			}
		});
	})
}
