$(document).ready(function () {
	$(document).on('click', '.js-open-edit-modal', openEditModal);
	function openEditModal(ev) {
		var type = $(this).data('modal-type');
		var html = $('.'+type).html();
		var modalElem = $('[data-remodal-id="editInfoModal"]');
		var modal = modalElem.remodal();
		var modalBody = modalElem.find('.modal-body');
		modalBody.html('');
		modalBody.append(html);
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
