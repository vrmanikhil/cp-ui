$(document).ready(function() {
	$(document).on('click', '.js-view-posting-details', function(e) {
		var modal = $('[data-remodal-id=modal]').remodal();
		// do ajax work
		modal.open();
	});
});
