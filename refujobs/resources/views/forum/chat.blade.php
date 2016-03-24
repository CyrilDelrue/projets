@extends('layouts.app')

@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2>Forum</h2>
			<p>
				Vous n’êtes pas seuls ! D’autres réfugiés ont vécu ce que vous vivez. Ils se sont posés les mêmes questions que vous.</br></br>

				Sur le forum, les membres posent des questions et les autres y répondent. Chaque question est rangée dans une catégorie pour que vous puissiez</br> facilement les retrouver.</br>
			</br>
			Comment utiliser le forum ?</br></br>

			Votre question a peut-être déjà été posée. Visiter les catégories pour voir si vous trouvez une réponse. </br>Sinon posez une question.
		</p>
	</div>
</div>
</div>





<div class="container">
	<div class="row col-md-10 col-md-offset-1 custyle">
		<table class="table table-striped custab">
			<thead>
				<a href="#" class="btn btn-primary btn-xl col-md-4 col-md-offset-4">Poser une question !</a>
				<tr>
					<th>Catégories</th>
					<th>Nombre de messages</th>
					<th>Dernier message</th>
				</tr>
			</thead>
			

			<a href="#">
				<tr>
					<td>Présentez-vous</td>
					<td>13</td>
					<td>07/01/2016</td>
				</tr>
			</a>
			<a href="">
				<tr>
					<td>Que mettre dans votre CV ?</td>
					<td>4</td>
					<td>06/01/2016</td>
				</tr>
			</a>
			<a href="">
				<tr>
					<td>Comment écrire une lettre de motivation ?</td>
					<td>9</td>
					<td>05/01/2016</td>
				</tr>
			</a>


			<a href="">
				<tr>
					<td>Parlez de vos passions et hobbies</td>
					<td>16</td>
					<td>04/01/2016</td>
				</tr>
			</a>
			<a href="">
				<tr>
					<td>Quel statut juridique pour vous ?</td>
					<td>1</td>
					<td>03/01/2016</td>
				</tr>
			</a>
			<a href="">
				<tr>
					<td>Comment s’habiller ?</td>
					<td>22</td>
					<td>02/01/2016</td>
				</tr>
			</a>
			<a href="">
				<tr>
					<td>Les associations</td>
					<td>3</td>
					<td>01/01/2016</td>
				</tr>
			</a>












		</table>
	</div>
</div>


@endsection