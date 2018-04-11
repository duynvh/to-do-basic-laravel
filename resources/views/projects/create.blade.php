@extends('app')

@section('content')
    <h2>Create Project</h2>
    @if(count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
 	<form method="POST" action="{{ route('projects.store') }}">
 	<input type="hidden" name="_token" value="<?= csrf_token(); ?>">	
	  <div class="form-group">
	    <label for="name">Name:</label>
	    <input type="text" name="name" class="form-control" id="name">
	  </div>
	  <div class="form-group">
	    <label for="slug">Slug:</label>
	    <input type="text" name="slug" class="form-control" id="slug">
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>  
@endsection