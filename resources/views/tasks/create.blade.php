@extends('app')

@section('content')
    <h2>Create Task for Project "{{ $project->name }}"</h2>
	@if(count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
 	<form method="POST" action="{{ route('projects.tasks.store', [$project->id]) }}">
 	<input type="hidden" name="_token" value="<?= csrf_token(); ?>">	
	  <div class="form-group">
	    <label for="name">Name:</label>
	    <input type="text" name="name" class="form-control" id="name">
	  </div>
	  <div class="form-group">
	    <label for="slug">Slug:</label>
	    <input type="text" name="slug" class="form-control" id="slug">
	  </div>
	  <div class="form-group">
	    <label for="description">Description:</label>
	    <textarea name="description" class="form-control" id="description"></textarea>
	  </div>
	  <div class="form-check">
	    <label class="form-check-label">
	      <input name="completed" type="checkbox" class="form-check-input">
	      Completed
	    </label>
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form> 
@endsection