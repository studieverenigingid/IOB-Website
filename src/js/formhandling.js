function formhandling() {

	function formDone(response) {
		console.log(response);
	}

	function formFail(response) {
		console.log(response);
	}

	$(document).on('submit' , 'form.event-signup', function(e) {

		e.preventDefault();

		var formData = new FormData($(this)[0]);

		$.ajax({
			url: wpjs_object.ajaxurl,
			type: 'POST',
			dataType: 'JSON',
			data: formData,
			processData: false,
			contentType: false
		}).done(
			formDone()
		).fail(
			formFail()
		);
	})
}
