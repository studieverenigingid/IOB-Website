function formhandling() {

	function formFail(formData) {
		console.log(formData.message);
	}

	function formDone(formData) {
		console.log(formData.message);
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
			formDone(formData)
		).fail(
			formFail(formData)
		);
	})
}
