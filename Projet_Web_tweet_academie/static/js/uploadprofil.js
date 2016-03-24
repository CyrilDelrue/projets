$(document).ready(function() {

	$('input[type="file"]').change(function (e){

		var data = new FormData(document.forms.namedItem('up'));
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "/Projet_Web_tweet_academie/profil/upload", true);

		$.ajax({
			url: "/Projet_Web_tweet_academie/admin/upload",
			type: "POST",
			data: data,
			contentType:false,
			cache: false,
			processData: false,
			success: function(reponse) {

				$('img').remove('.img');
				var parse = JSON.parse(reponse);
				var resultName = parse.profil.name;
				console.log(resultName);
				$('<div class="div">').insertAfter($("#upload"));
				$(".div").append('<img class="img" src="/Projet_Web_tweet_academie/static/upload/' + resultName   + '" alt="photo "/>');
				// $(".img").css({
				// 	'width':'auto',
				// 	'height':'auto',
				// 	'max-width': '100%',

				// });
			}
		});

	});
});