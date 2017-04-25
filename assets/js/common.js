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
		var html = elem.parent().find('.dropdown__html').html();
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
			dropdownPane.html("");
		} else {
			dropdownPane.removeClass('hidden');
			dropdownPane.html(html);
		}

		elem.toggleClass('dropdown__item--clicked');
	});

	$('.js-nav--stacked').on('click', '.js-nav-link', function (e) {
		var elem;
		if ($(e.target).hasClass('js-nav-link')) {
			elem = $(e.target);
		} else {
			elem = $(e.target).closest('.js-nav-link');
		}

		if (elem.length === 0) {
			return;
		}

		var container = elem.closest('.js-nav--stacked');
		var activeElem = container.find('.js-nav-link.active');
		if (elem.is(activeElem)) {
			return;
		}

		activeElem.removeClass('active');
		elem.addClass('active');
	});
});
