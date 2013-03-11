jQuery(document).ready(function($) {
	var state = $('#wp-content-wrap').hasClass('html-active')? 'html' : 'tmce';
	var container = $('#wp-content-editor-container');
	var instance;

	var setup = function() {
		$('#ed_toolbar').css('visibility', 'hidden');

		instance = $('#content').acetextarea({
			ace: {
				mode: 'html'
			}
		});
	}

	var htmlMode = function() {
		if(!instance) setup();
		else instance.acetextarea('show');

		$('#wp-word-count').hide();

		instance.acetextarea('update');
		instance.acetextarea('resize', container.width() - 1, container.height());
	}

	var tmceMode = function() {
		instance.acetextarea('hide');
		$('#wp-word-count').show();
	}

	if(state == 'html') htmlMode();

	$('#content-tmce').click(tmceMode);
	$('#content-html').click(htmlMode);

});