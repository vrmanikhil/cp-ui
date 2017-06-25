$(document).ready(function () {
	$(document).on('click', '.js-open-edit-modal', openEditModal);
	function openEditModal(ev) {
		var type = $(this).data('modal-type');
		emptyForm(type);
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

	$(document).on('click', '.js-edit-entity', openEditEntityModal);
	function openEditEntityModal(ev) {
		var keyMap = {
			achievementTitle: 'achievementName',
			achievementDescription: 'achievementDescription',
			projectTitle: 'projectName',
			endMonth: 'endingMonth',
			endYear: 'endingYear',
			startMonth: 'startingMonth',
			startYear: 'startingYear',
			description: 'workDescription',
			year: 'educationYear',
			score: 'educationScore',
			scoreType: 'educationScoreType',
			position: 'positionInCompany'
		};
		var json = $(this).data('json');
		var type = $(this).data('type');
		emptyForm(type);
		if (type === 'edit-education') {
			keyMap.description = 'educationDescription';
		}

		var modalId = $('.'+type).data('remodal-id');
		var modalElem = $('[data-remodal-id="'+modalId+'"]');
		$.each(json, function (key, value) {
			var name = keyMap[key] || key;
			var formElem = modalElem.find('[name="'+name+'"]');
			if (formElem.length > 0) {
				if (formElem[0].nodeName === 'INPUT' || formElem[0].nodeName === 'SELECT') {
					formElem.val(value);
				}

				if (formElem[0].nodeName === 'TEXTAREA') {
					if (formElem.data('ckeditor') === 'yes' && CKEDITOR.instances[name]) {
						setTimeout(function(){
							CKEDITOR.instances[name].setData(value);
						}, 100);
					} else {
						formElem.text(value);
					}
				}
			}
		});
		if (type === 'edit-personal-information') {
			formElem.find('[name="location"]').val(json['city']+', '+json['state']);
		}

		if(type === 'edit-company-details') {
			formElem.find('img[id="companyLogo"]').attr('src', json['companyLogo'] || '');
		}

		var modal = modalElem.remodal();
		modal.open();
	}

	function emptyForm(formClass) {
		formElem = $('.' + formClass);
		if (formElem.length === 0) return;
		$.each(formElem.find('input'), function (index, elem) {
			if ($(elem).attr('type') !== 'submit') {
				$(elem).val('');
			}

		});
		$.each(formElem.find('textarea'), function (index, elem) {
			var id = $(elem).attr('id');
			if ($(elem).data('ckeditor') === 'yes' && CKEDITOR.instances[id]) {
				CKEDITOR.instances[id].setData('');
			} else {
				$(elem).text('');
			}
		});
		$.each(formElem.find('select'), function (index, elem) {
			$(elem)[0].selectedIndex = 0;
		});
	}
});
