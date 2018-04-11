<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
class ProjectsController extends Controller
{
    public function index()
	{
		$projects = Project::all();
		return view('projects.index', ['projects' => $projects]);
	}

	public function create()
	{
		return view('projects.create');
	}

	public function store(Request $request)
	{
		$this->validate($request, [
	        'name' => 'required|min:3',
			'slug' => 'required'
    	]);

		$data = [
			'name' => $request->input('name'),
			'slug' => $request->input('slug')
		];
		Project::insert($data);
		return redirect()->route('projects.index');
	}

	public function show($id)
	{
		$project = Project::find($id);
		return view('projects.show', compact('project'));
	}

	public function edit($id)
	{
		$project = Project::find($id);
	    return view('projects.edit', compact('project'));
	}

	public function update($id, Request $request)
	{
		$this->validate($request, [
	        'name' => 'required|min:3',
			'slug' => 'required'
    	]);
    	
		$projectModel = new Project();
		$projectItem  = $projectModel::find($id);

		$projectItem->name = $request->input('name');
		$projectItem->slug = $request->input('slug');

		$projectItem->save();

		return redirect()->route('projects.index');
	}

	public function destroy($id)
	{
		$projectModel = new Project();
		$projectItem  = $projectModel::find($id);
		$projectItem->delete();
		return redirect()->route('projects.index');
	}
}
