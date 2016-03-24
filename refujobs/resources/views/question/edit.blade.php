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
					<label>Question 1</label>
					<input type="text" name="quest_1" class="form-control" placeholder="Enter a question">
				</div>

				<div class="form-group">
					<label>Default value question 1</label>
					<select name="def_1" class="form-control">
						<option value="0">No</option>
						<option value="1">Yes</option>
					</select>
				</div>

				<div class="form-group">
					<label>Question 2</label>
					<input type="text" name="quest_2" class="form-control" placeholder="Enter a question">
				</div>
				<div class="form-group">
					<label>Default value question 2</label>
					<select name="def_2" class="form-control">
						<option value="0">No</option>
						<option value="1">Yes</option>
					</select>
				</div>

				<div class="form-group">
					<label>Question 3</label>
					<input type="text" name="quest_3" class="form-control" placeholder="Enter a question">
				</div>
				<div class="form-group">
					<label>Default value question 3</label>
					<select name="def_3" class="form-control">
						<option value="0">No</option>
						<option value="1">Yes</option>
					</select>
				</div>

				<div class="form-group">
					<label>Question 4</label>
					<input type="text" name="quest_4" class="form-control" placeholder="Enter a question">
				</div>
				<div class="form-group">
					<label>Default value question 4</label>
					<select name="def_4" class="form-control">
						<option value="0">No</option>
						<option value="1">Yes</option>
					</select>
				</div>

				<div class="form-group">
					<label>Question 5</label>
					<input type="text" name="quest_5" class="form-control" placeholder="Enter a question">
				</div>
				<div class="form-group">
					<label>Default value question 5</label>
					<select name="def_5" class="form-control">
						<option value="0">No</option>
						<option value="1">Yes</option>
					</select>
				</div>

				<div class="form-group">
					<label>Question 6</label>
					<input type="text" name="quest_6" class="form-control" placeholder="Enter a question">
				</div>
				<div class="form-group">
					<label>Default value question 6</label>
					<select name="def_6" class="form-control">
						<option value="0">No</option>
						<option value="1">Yes</option>
					</select>
				</div>

				<div class="form-group">
					<label>Question 7</label>
					<input type="text" name="quest_7" class="form-control" placeholder="Enter a question">
				</div>
				<div class="form-group">
					<label>Default value question 7</label>
					<select name="def_7" class="form-control">
						<option value="0">No</option>
						<option value="1">Yes</option>
					</select>
				</div>

				<div class="form-group">
					<label>Question 8</label>
					<input type="text" name="quest_8" class="form-control" placeholder="Enter a question">
				</div>
				<div class="form-group">
					<label>Default value question 8</label>
					<select name="def_8" class="form-control">
						<option value="0">No</option>
						<option value="1">Yes</option>
					</select>
				</div>

				<div class="form-group">
					<label>Question 9</label>
					<input type="text" name="quest_9" class="form-control" placeholder="Enter a question">
				</div>
				<div class="form-group">
					<label>Default value question 9</label>
					<select name="def_9" class="form-control">
						<option value="0">No</option>
						<option value="1">Yes</option>
					</select>
				</div>

				<div class="form-group">
					<label>Question 10</label>
					<input type="text" name="quest_10" class="form-control" placeholder="Enter a question">
				</div>
				<div class="form-group">
					<label>Default value question 10</label>
					<select name="def_10" class="form-control">
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