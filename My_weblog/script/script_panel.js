$(document).ready(function(){

	var stock = "";
	var nbr = 0;

	$(".modif").click(function (e)
	{
		e.preventDefault();
		var td = e.target.parentNode;
		var tr = td.parentNode;
		var child = tr.childNodes;
		console.log(td);
		for (var i = 0 ; i < child.length - 1; i++)
		{
			var text = child[i].innerHTML;
			
			if(i === 0)
			{
				$(child[i]).html("");
				$(child[i]).append('<input type="text" readonly class="id' + nbr +'" name="id" />');
				$('.id' + nbr).val(text);
				$('.id' + nbr).css({
					width: '40px'
				});
				$(child[i]).css({
					width: '50px'
				});
			}
			else if (i == 1)
			{
				$(child[i]).html("");
				$(child[i]).append('<input class="login' + nbr +'" name="login" />');
				$('.login' + nbr).val(text);
				$('.login' + nbr).css({
					width: '150px'
				});
				$(child[i]).css({
					width: '170px'
				});
			}
			else if(i == 2)
			{
				$(child[i]).html("");
				$(child[i]).append('<input type="email" class="mail' + nbr +'" name="email" />');
				$('.mail' + nbr).val(text);
				$('.mail' + nbr).css({
					width: '280px',
					
				});
				$(child[i]).css({
					width: '320px',
				});
			}
			else if(i == 3)
			{
				$(child[i]).html("");
				$(child[i]).append('<input class="date' + nbr +'" name="date" />');
				$('.date' + nbr).val(text);
				$('.date' + nbr).css({
					width: '300px',
					
				});
				$(child[i]).css({
					width: '320px',
				});
			}
			else if(i == 4)
			{
				$(child[i]).html("");
				var select = '<select class="admin_sexe' + nbr +'" name="f_or_m"><option>Sexe</option><option value="F">Femme</option><option value="H">Homme</option></select>';
				$(child[i]).append(select);
				$('.admin_sexe' + nbr).css({
					width: '115px',
					'margin-left': '1px'
					
				});
				$(child[i]).css({
					width: '130px',
				});
			}
			else if(i == 5)
			{
				$(child[i]).html("");
				var select_one = '<select class="admin' + nbr +'" name="users"><option>Changer Droit</option><option value="admin">Administrateur</option>';
				select_one += '<option value="blogger">Bloggeur</option><option value="user">Utilisateur</option></select>';
				$(child[i]).append(select_one);
				$('.admin'+ nbr).css({
					width: '165px',
					'margin-left': '1px'
					
				});
				$(child[i]).css({
					width: '185px',
				});
			}
			else if(i == 6)
			{
				$(child[i]).html("");
				$(child[i]).append('<input type="submit" class="modif" value="Valider"/>');
				$(child[i]).css({
					width: '130px'
				});
			}
		}
		nbr++;
	});

	$(".del").click(function (e) {
		e.preventDefault();

		if (confirm("Voulez-vous vraiment supprimer cette utilisateur ?"))
		{
			var td = e.target.parentNode;
			var tr = td.parentNode;
			var child = tr.childNodes;
			$.post(
				'modif',
				{
					id :  $(child[0]).html(),
					del : "Go"
				}

				);
			window.location.href = "./admin";
		}
	});

	$(".del_billet").click(function (z) {
		z.preventDefault();

		if (confirm("Voulez-vous vraiment supprimer cette article ?"))
		{
			var td = z.target.parentNode;
			var tr = td.parentNode;
			var child = tr.childNodes;
			$.post(
				'modif',
				{
					id :  $(child[0]).html(),
					del_billet : "Go"
				}

				);
			location.reload();
		}
	});


	$(".del_com").click(function (a) {
		a.preventDefault();

		if (confirm("Voulez-vous vraiment supprimer ce commentaire ?"))
		{
			var td = a.target.parentNode;
			var tr = td.parentNode;
			var child = tr.childNodes;
			$.post(
				'modif',
				{
					id :  $(child[0]).html(),
					del_com : "Go"
				}

				);
			location.reload();
		}
	});	

	$(".modif_billet").click(function (b) {
		b.preventDefault();
		console.log("mdr");
		var td = b.target.parentNode;
			var tr = td.parentNode;
			var child = tr.childNodes;
			var text = child[0].innerHTML;
			$(child[0]).html("");
				$(child[0]).append('<input type="text" readonly class="id' + nbr +'" name="id" />');
				$('.id' + nbr).val(text);
				$('.id' + nbr).css({
					width: '40px'
				});
				$(child[0]).css({
					width: '50px'
				});
				nbr++;
			$(child[5]).html("");
				$(child[5]).append('<input type="submit" class="modif" value="Modifier"/>');
				$(child[5]).css({
					width: '130px'
				});
	});	

});