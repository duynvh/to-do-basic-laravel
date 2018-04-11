@extends('app')
 
@section('content')
    <h2>{{ $project->name }}</h2>
    <a href="{{ route('projects.tasks.create', [$project->id]) }}" class="btn btn-success" style="margin-bottom: 20px">Add new Task</a>
    @if ( !$project->tasks->count() )
        Your project has no tasks.
    @else
        <table class="table table-striped">
            <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach( $project->tasks as $task )
            <tr>
                <td>
                  <li style="list-style: none;"><a href="{{ route('projects.tasks.show', [$project->id,$task->id]) }}">{{ $task->name }}</a></li>
                </td>
                <td>
                  <a href="{{ route('projects.tasks.edit', [$project->id, $task->id]) }}" class="btn btn-primary">Edit</a>
                  <form style="display: inline-block;" action="{{ route('projects.tasks.destroy', [$project->id, $task->id]) }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input  type="submit" class="btn btn-danger" value="delete">
                </form>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
    @endif
@endsection