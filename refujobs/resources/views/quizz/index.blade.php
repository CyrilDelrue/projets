@extends('admin/admin_template')

@section('content')
<div class="col-md-offset-2 col-md-8">
	<div class="box box-danger">
		<div class="box-header with-border">
			<h3 class="box-title">Question list</h3>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-offset-1 col-md-10">
					@foreach($quizzs as $quizz)
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingTwo">
								<h4 class="panel-title">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#questrep{{$quizz->id}}" aria-expanded="false" aria-controls="questrep{{$quizz->id}}">
										{{ $quizz->name }}
									</a>
									<a href="{{ url('admin/question/edit', $quizz->id) }}" class="btn btn-primary col-md-offset-10">Edit</a>
								</h4>
							</div>
							<div id="questrep{{$quizz->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
								<div class="panel-body">
									@foreach($questions as $question)
									@if($question->quizz_id === $quizz->id)
									<p>{{ $question->question }}
										@if($question->default === 1)
										<a href="reponse/new" class="btn btn-primary pull-right">Ajout reponse</a>
										@endif
									</p>
									<hr>
									@endif
									@endforeach
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		<!-- /.box-body -->
	</div>
</div>
@endsection