$(document).ready(function(){
	$("#send").click(function (e) {
		var tag = [];
		e.preventDefault();
		$("input[type='checkbox']:checked").each(
			function() {
				tag.push($(this).val());
			});          
	$.post(
		'accueil',
		{
			contenu : $('#textarea').text(),
			titre : $('#title').val(),
			tag : tag
		}

		);
	window.location.href = "./accueil";
});
});