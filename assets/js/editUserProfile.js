$(document).ready(function () {
	$(document).on('click', '.js-open-edit-modal', openEditModal);
	function openEditModal(ev) {
		var type = $(this).data('modal-type');
		var modalId = $('.'+type).data('remodal-id');
		var modalElem = $('[data-remodal-id="'+modalId+'"]');
		var modal = modalElem.remodal();
		modal.open();
	}

	(function(){
		var textareas = $('body').find('textarea');
		$(textareas).each(function (index, elem) {
			var isCkeditor = $(elem).data('ckeditor');
			if (isCkeditor === 'yes') {
				CKEDITOR.replace($(elem).attr('id'));
			}
		});
	})();
});
