$('document').ready(function() {
	$.validator.addMethod('letterspace', function(value, element) {
		return this.optional(element) || /^[a-zA-ZñÑ/\s\W]+$/i.test(value);
	}, "Sólo letras, por favor.");

	jQuery.validator.addMethod('lettersnumbersdash', function(value, element) {
		return this.optional(element) || /^[a-z0-9\-]+$/i.test(value);
	}, 'Sólo letras, números o guión, por favor.');

});