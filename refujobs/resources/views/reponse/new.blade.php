@extends('admin/admin_template')

@section('content')

<div class="col-md-offset-2 col-md-8">
  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Create question</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <form role="form" method="POST" action="{{ url('admin/reponse/create') }}">
        <!-- text input -->
        <div class="form-group">
          <label>Response</label>
          <input type="text" name="reponse" class="form-control" placeholder="Enter a response">
        </div>

        <div class="form-group">
          <label>Question</label>
          <select name="question_id" class="form-control">
            @foreach($quizzs as $quizz)
              @foreach($questions as $question)
              @if($question->default === 1)
                <option value="{{ $question->id }}">{{ $quizz->name }} - {{ $question->question }}</option>
              @endif
              @endforeach
            @endforeach
          </select>
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