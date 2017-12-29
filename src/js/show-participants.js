function createListSucceeds(form, data) {
	// Reveal the message that sending was succesful
	var list = data.join("<br />");
	var successMessage = $('<div>');
	successMessage.addClass('event-signup__message event-signup__message--success');
	successMessage.html(list);
	form.append(successMessage);
	form.addClass('show-participants--success');
	form.removeClass('show-participants--sending');
}

function show_participants () {
	$(document).on('submit' , 'form.show-participants', function(e) {

		e.preventDefault();

		var form = $(this);
		var data = new FormData(form[0]);

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
					createListSucceeds(form, data);
				}
			},
			error: function(data) {
				formFails(form, data);
			}
		});
	})
};
