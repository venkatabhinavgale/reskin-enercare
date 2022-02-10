(function($) {
	console.log('omg');
	var testing = document.querySelector('fieldset.radio__boiler-furnace');
	console.log(testing);
	$(document).ready( function() {
		var boilerFurnaceFieldset = $('fieldset.radio__boiler-furnace');
		var furnaceRadios = boilerFurnaceFieldset.find('input[value=Furnace][type=radio]');
		var boilerRadios = boilerFurnaceFieldset.find('input[value=Boiler][type=radio]');

		$('<img alt="" role="presentation" width=90 height=90 src="/wp-content/uploads/2021/10/furnace-24px-b.svg"/>').insertBefore(furnaceRadios);
		$('<img alt="" role="presentation" width=90 height=90 src="/wp-content/uploads/2021/10/boiler-24px-b.svg"/>').insertBefore(boilerRadios);
	});
})(jQuery);


