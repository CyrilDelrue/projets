@extends('admin.admin_template')

@section('content')
<div class="box">
	<div class="box-header">
		<h3 class="box-title">User list</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
		<thead>
			<tr role="row">
				<th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Login</th>
				<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Firstname/Name</th>
				<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Email</th>
				<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Phone number</th>
				<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<td>{{ $user->login }}</td>
				<td>{{ $user->firstname }} {{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->phone }}</td>
				<td>
					<a href="{{ url('admin/profil/show', $user->id) }}" class="btn btn-primary">Show</a>
					<a href="{{ url('admin/profil/edit', $user->id) }}" class="btn btn-warning">Edit</a>
					<a href="{{ url('admin/profil/destroy', $user->id) }}" class="btn btn-danger">Delete</a>
				</td>
			</tr>
			@endforeach
		</tbody>
		<!-- <tfoot>
			<tr>
				<th rowspan="1" colspan="1">Rendering engine</th>
				<th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th>
				<th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th>
			</tr>
		</tfoot> -->
	</table>
</div>
</div>
<!-- <div class="row">
	<div class="col-sm-5">
		<div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
	</div> -->
	<div class="col-sm-7">
		<div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
			<ul class="pagination">
				<li class="paginate_button previous disabled" id="example2_previous">
					<a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">Previous</a>
				</li>
				<li class="paginate_button active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0">1</a>
				</li>
				<li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0">2</a>
				</li>
				<li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0">3</a>
				</li>
				<li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0">4</a>
				</li>
				<li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0">5</a>
				</li>
				<li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0">6</a>
				</li>
				<li class="paginate_button next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div>
			</div>
		</div>
	</div>
</div>
@endsection
