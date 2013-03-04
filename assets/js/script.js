
;(function($, document, window, undefined) {

	"use strict";

	var app = {

		init: function() {

			var t = this;

			$('.btn-fetch').click(function(e) {
				e.preventDefault();
				t.fetch();
			});

		},

		fetch: function() {

			var t = this,
				url = $('.tf-url').val();

			$.ajax({

				url: 'get-url.php',
				type: 'GET',
				dataType: 'json',

				data: {
					url: url
				},

				success: t.fetchSuccess,
				error: t.fetchError

			});

		},

		fetchSuccess: function(data) {
			$('.output code').text(data.data);
		},

		fetchError: function() {
			window.alert('Could not load URL');
		}

	};

	app.init();


}(jQuery, document, window));


