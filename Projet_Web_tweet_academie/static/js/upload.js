$(document).ready(function() {

		$('input[type="file"]').change(function (e){

			var data = new FormData(document.forms.namedItem('upaze'));
			var xhr = new XMLHttpRequest();
			xhr.open("POST", "../tweet/upload", true);

			$.ajax({
				url: "../tweet/upload",
				type: "POST",
				data: data,
				contentType:false,
				cache: false,
				processData: false,
				success: function(reponse) {
				var parse = JSON.parse(reponse);
				var resultName = parse;
				console.log(parse);
				var content = $('<div class="div">').insertAfter($("#upload"));
				var t = $(".div").append('<img class="upload" src="/Projet_Web_tweet_academie/static/uploadTweet/' + parse + '" alt="photo " "/>');
					$(".upload").css({
						'width':'auto',
						'height':'auto',
						'max-width': '100%',
					});
				}
			});
		});
	});

