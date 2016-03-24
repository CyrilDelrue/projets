@extends('admin/admin_template')

@section('content')
<div class="col-md-offset-2 col-md-8">
	<div class="box box-primary">
		<div class="box-body box-profile">
			<img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">

			<h3 class="profile-username text-center">{{ $user->firstname}} {{ $user->name }}</h3>

			<p class="text-muted text-center">Software Engineer</p>

			<ul class="list-group list-group-unbordered">
				<li class="list-group-item">
					<b>Email</b> <p class="pull-right">{{ $user->email }}</p>
				</li>
				<li class="list-group-item">
					<b>Phone number</b> <p class="pull-right">{{ $user->phone }}</p>
				</li>
				<li class="list-group-item">
					<b>Status</b> <p class="pull-right"> 
					@if( $user->role == 0)
					Refugee
					@elseif($user->role == 1)
					Benevol
					@endif
				</p>
			</li>
		</ul>

		<a href="#" class="btn btn-primary btn-block"><b>Send message</b></a>
	</div>
</div>
@endsection