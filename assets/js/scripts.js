(function($, document) {
	$(document).ready(function() {
		var $select    = $('select'),
		    $input     = $select.next('input'),
		    inputClass = 'show';
		
		$select.change(function () {
			if ($select.val() === 'other') {
				$input.addClass(inputClass);
			} else {
				$input.removeClass(inputClass);
			}
		});
	});
}(jQuery, document));