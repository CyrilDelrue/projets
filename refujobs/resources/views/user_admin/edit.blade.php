@extends('admin/admin_template')

@section('content')
<div class="col-md-offset-2 col-md-8">
	<div class="box box-warning">
		<div class="box-header with-border">
			<h3 class="box-title">Edit user</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form class="form-horizontal" method="POST" action="{{ url('admin/profil/update')}}">
			<div class="box-body">
				<input type="hidden" name="id" value="{{ $user->id }}">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Login</label>

					<div class="col-sm-10">
						<input type="text" class="form-control" name="login" id="inputEmail3" placeholder="{{ $user->login }}">
					</div>
				</div>

				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Name</label>

					<div class="col-sm-10">
						<input type="text" class="form-control" name="name" id="inputEmail3" placeholder="{{ $user->name }}">
					</div>
				</div>

				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Firstname</label>

					<div class="col-sm-10">
						<input type="text" class="form-control" name="firstname" id="inputEmail3" placeholder="{{ $user->firstname }}">
					</div>
				</div>

				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Email</label>

					<div class="col-sm-10">
						<input type="email" class="form-control" name="email" id="inputEmail3" placeholder="{{ $user->email }}">
					</div>
				</div>

				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Phone</label>

					<div class="col-sm-10">
						<input type="text" class="form-control" name="phone" id="inputEmail3" placeholder="{{ $user->phone }}">
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Password</label>

					<div class="col-sm-10">
						<input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Password">
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Comfirm password</label>

					<div class="col-sm-10">
						<input type="password" class="form-control" name="comfirm" id="inputPassword3" placeholder="Password">
					</div>
				</div>
			</div>
			<!-- /.box-body -->
			<div class="box-footer">
				<button type="submit" class="btn btn-default">REFERER</button>
				<button type="submit" class="btn btn-warning pull-right">Edit</button>
			</div>
			<!-- /.box-footer -->
		</form>
	</div>
</div>
@endsection