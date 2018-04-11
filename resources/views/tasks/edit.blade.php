@extends('app')

@section('content')
    <h2>Edit Task "{{ $task->name }}" for Project "{{ $project->name }}"</h2>
	@if(count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
 	<form method="POST" action="{{ route('projects.tasks.update', [$project->id, $task->id]) }}">
 	<input type="hidden" name="_token" value="<?= csrf_token(); ?>">	
 	<input type="hidden" name="_method" value="PATCH">
	  <div class="form-group">
	    <label for="name">Name:</label>
	    <input type="text" name="name" class="form-control" value="{{ $task->name }}" id="name">
	  </div>
	  <div class="form-group">
	    <label for="slug">Slug:</label>
	    <input type="text" name="slug" class="form-control" value="{{ $task->slug }}" id="slug">
	  </div>
	  <div class="form-group">
	    <label for="description">Description:</label>
	    <textarea name="description" class="form-control" id="description">{{ $task->description }}</textarea>
	  </div>
	  <div class="form-check">
	    <label class="form-check-label">
	      <input name="completed" {{ $task->complete == 1 ? 'checked' : ''}} type="checkbox" class="form-check-input">
	      Completed
	    </label>
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form> 
@endsection