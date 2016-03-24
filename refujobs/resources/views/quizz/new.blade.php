@extends('admin/admin_template')

@section('content')

<div class="col-md-offset-2 col-md-8">
  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Create Quizz</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <form role="form" method="POST" action="{{ url('admin/quizz/create') }}">
        <!-- text input -->
        <div class="form-group">
          <label>Question</label>
          <input type="text" name="name" class="form-control" placeholder="Name quizz">
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-warning pull-right">Edit</button>
        </div>
      </form>
    </div>
    <!-- /.box-body -->
  </div>
</div>

@endsection