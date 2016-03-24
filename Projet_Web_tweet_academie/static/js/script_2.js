$(document).ready(function() {

	$('#following').click(function (e)
	{
		$('div').remove("#delete");
		var id_user = $('#id').val();
		$.ajax({
			url: "/Projet_Web_tweet_academie/profil/showfollowing",
			type: "POST",
			data: {id: id_user},
			success: function(reponse) {

				var parse = JSON.parse(reponse);
				var test = "";
				console.log(parse);
				$('.container').append('<div id="delete" class="profil col-md-12 col-sm-12 col-xs-12">');
				for (var i = 0; i < parse.length; i++) 
				{
					test +='<div class="fb-profile col-md-4">';
					test +='<img align="left" class="fb-image-lg" src="http://lorempixel.com/850/280/nightlife/5/" alt="Profile image example"/>';
					test +='<img align="left" class="fb-image-profile thumbnail" src="http://lorempixel.com/180/180/people/9/" alt="Profile image example"/>';
					test +='<div class="fb-profile-text">';
					test +='<h1>' + parse[i].pseudo + '</h1>';
					test +='<p>'+ parse[i].description +'</p>';
					test +='</div></div>';
				}
				$('#delete').append(test);
			}
			 //    <div class="fb-profile">
    //     <img align="left" class="fb-image-lg" src="http://lorempixel.com/850/280/nightlife/5/" alt="Profile image example"/>
    //     <img align="left" class="fb-image-profile thumbnail" src="http://lorempixel.com/180/180/people/9/" alt="Profile image example"/>
    //     <div class="fb-profile-text">
    //         <h1>Eli Macy</h1>
    //         <p>Girls just wanna go fun.</p>
    //     </div>
    // </div>
		});
	});

	$('#followers').click(function (e)
	{
		$('div').remove("#delete");
		console.log($(".fb-profile col-md-4"));
		var id_user = $('#id').val();
		$.ajax({
			url: "/Projet_Web_tweet_academie/profil/showfollower",
			type: "POST",
			data: {id: id_user},
			success: function(reponse) {

				var parse = JSON.parse(reponse);
				var test = "";
				$('.container').append('<div id="delete" class="profil col-md-12 col-sm-12 col-xs-12">');
				for (var i = 0; i < parse.length; i++) 
				{
					test +='<div class="fb-profile col-md-4">';
					test +='<img align="left" class="fb-image-lg" src="http://lorempixel.com/850/280/nightlife/5/" alt="Profile image example"/>';
					test +='<img align="left" class="fb-image-profile thumbnail" src="http://lorempixel.com/180/180/people/9/" alt="Profile image example"/>';
					test +='<div class="fb-profile-text">';
					test +='<h1>' + parse[i].pseudo + '</h1>';
					test +='<p>'+ parse[i].description +'</p>';
					test +='</div></div>';
				}
				$('#delete').append(test);
			}
		});

	});


});