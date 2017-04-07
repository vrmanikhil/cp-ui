$(document).ready(function () {
	$('.js-dropdown__container').on('click', '.js-dropdown__item', function(e) {
		var elem;
		if ($(e.target).hasClass('js-dropdown__item')) {
			elem = $(e.target);
		} else {
			elem = $(e.target).closest('.js-dropdown__item');
		}

		if (elem.length === 0) {
			return;
		}

		var container = elem.closest('.js-dropdown__container');
		if (container.length === 0) {
			return;
		}

		var dropdownPane = container.find('.js-dropdown__pane');
		var activeElemClicked = false;
		$.each(container.find('.dropdown__item--clicked'), function (index, value) {
			if ($(value).is(elem)) {
				activeElemClicked = true;
			} else {
				$(value).removeClass('dropdown__item--clicked');
			}
		});

		if (activeElemClicked) {
			dropdownPane.addClass('hidden');
		} else {
			dropdownPane.removeClass('hidden');
		}

		elem.toggleClass('dropdown__item--clicked');
	});
});
