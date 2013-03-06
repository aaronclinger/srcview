(function($, document) {
	$(document).ready(function() {
		var $select    = $('select'),
		    $input     = $select.next('input'),
		    inputClass = 'show',
		    checkSelect;
		
		checkSelect = function () {
			if ($select.val() === 'other') {
				$input.addClass(inputClass);
			} else {
				$input.removeClass(inputClass);
			}
		};
		
		$select.change(checkSelect);
		
		checkSelect();
	});
}(jQuery, document));