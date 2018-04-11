@extends('app')
 
@section('content')
	<a href="{{ route('projects.create') }}" class="btn btn-success" style="margin-bottom: 20px">Add new Projects</a>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @if(count($projects) > 0)
              @foreach($projects as $project)
              <tr>
                <th scope="row">{{ $project->id }}</th>
                <td>
                  <li style="list-style: none;"><a href="{{ route('projects.show', $project->id) }}">{{ $project->name }}</a></li>
                </td>
                <td>
                  <a href="{{ route('projects.edit', [$project->id]) }}" class="btn btn-primary">Edit</a>
                  <form style="display: inline-block;" action="{{ route('projects.destroy', [$project->id]) }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input  type="submit" class="btn btn-danger" value="delete">
                </form>
                </td>
              </tr>
              @endforeach
            @else
            <tr>
              <td colspan="3">No data</td>
            </tr>
            @endif
          </tbody>
        </table>
@endsection