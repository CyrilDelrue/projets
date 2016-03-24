$(document).ready(function(){
		$("#com").click(function (e) {
		e.preventDefault();
			$.post(
				'',
				{
					commentaires : $('#content').val(),
					valider : "Go"
				}

				);
				location.reload();
		});

		$('body').append('<a href="#top" class="top_link" title="Revenir en haut de page">↑</a>');
			$('.top_link').css({
				'font-size'				: 	'20px',
				'color' 				: 	'white', 
				'position'				:	'fixed',
				'right'					:	'20px',
				'bottom'				:	'50px',
				'display'				:	'none',
				'padding'				:	'20px',
				'background'			:	'black',
				'-moz-border-radius'	:	'0px',
				'-webkit-border-radius'	:	'40px',
				'border-radius'			:	'5px',
				'opacity'				:	'0.3',
				'z-index'				:	'2000'
			});  
			$(window).scroll(function(){
				if($(document).scrollTop() >=10) 
					$('.top_link').fadeIn(600);
				else
					$('.top_link').fadeOut(600);
			});

});