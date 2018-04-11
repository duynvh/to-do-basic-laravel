@extends('app')
 
@section('content')
    <h2>
    	<a href="{{ route('projects.show', [$task->project->id]) }}">{{ $task->project->name }}</a>-{{ $task->name }}
    </h2>
 
    {{ $task->description }}
@endsection