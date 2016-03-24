@extends('admin/admin_template')

@section('content')

<div class="col-md-offset-2 col-md-8">
	<div class="box box-warning">
		<div class="box-header with-border">
			<h3 class="box-title">Create questions</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<form role="form" method="POST" action="{{ url('admin/question/create') }}">
				<!-- text input -->
				<div class="form-group">
					<label>Quizz</label>
					<select name="quizz_id" class="form-control">
						@foreach($quizzs as $quizz)
						<option value="{{ $quizz->id }}">{{ $quizz->name }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label>Question</label>
					<input type="text" name="question" class="form-control" placeholder="Enter a question">
				</div>

				<div class="form-group">
					<label>Default value question</label>
					<select name="default" class="form-control">
						<option value="0">No</option>
						<option value="1">Yes</option>
					</select>
				</div>



				<div class="box-footer">
					<button type="submit" class="btn btn-warning pull-right">Create</button>
				</div>
			</form>
		</div>
		<!-- /.box-body -->
	</div>
</div>

@endsection