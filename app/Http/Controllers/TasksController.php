<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;
class TasksController extends Controller
{
    public function index(Project $project)
	{
		return view('tasks.index', compact('project'));
	}
 
	/**
	 * Show the form for creating a new resource.
	 *
	 * @param  \App\Project $project
	 * @return Response
	 */
	public function create($id)
	{
		$projectModel = new Project();
		$projectItem  = $projectModel::find($id);
		return view('tasks.create', [
			'project' => $projectItem
		]);
	}
 
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Project $project
	 * @return Response
	 */
	public function store($id, Request $request)
	{
		$this->validate($request, [
	        'name' => 'required|min:3',
			'slug' => 'required',
			'description' => 'required'
    	]);

		$data = [
			'project_id' => $id,
			'name' => $request->input('name'),
			'slug' => $request->input('slug'),
			'description' => $request->input('description'),
			'completed' => $request->has('completed') ? 1 : 0
		];
		Task::insert($data);
		return redirect()->route('projects.show',[$id]);
	}
 
	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Project $project
	 * @param  \App\Task    $task
	 * @return Response
	 */
	public function show($idProject, $idTask)
	{
		$taskModel = new Task();
		$taskItem  = $taskModel::find($idTask);
		return view('tasks.show', [
			'task' => $taskItem
		]);
	}
 
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Project $project
	 * @param  \App\Task    $task
	 * @return Response
	 */
	public function edit($idProject, $idTask)
	{
		$projectModel = new Project();
		$projectItem  = $projectModel::find($idProject);
		$taskModel    = new Task();
		$taskItem     = $taskModel::find($idTask);
		return view('tasks.edit', [
			'project' => $projectItem,
			'task'    => $taskItem
		]);
	}
 
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Project $project
	 * @param  \App\Task    $task
	 * @return Response
	 */
	public function update($idProject, $idTask, Request $request)
	{
		$this->validate($request, [
	        'name' => 'required|min:3',
			'slug' => 'required',
			'description' => 'required'
    	]);

		$taskModel    = new Task();
		$taskItem     = $taskModel::find($idTask);

		$taskItem->name 		= $request->input('name');
		$taskItem->slug 		= $request->input('slug');
		$taskItem->description 	= $request->input('description');
		$taskItem->completed 	= $request->has('completed') ? 1 : 0;

		$taskItem->save();
		return redirect()->route('projects.show',[$idProject]);
	}
 
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Project $project
	 * @param  \App\Task    $task
	 * @return Response
	 */
	public function destroy($idProject, $idTask)
	{
		$taskModel    = new Task();
		$taskItem     = $taskModel::find($idTask);
		$taskItem->delete();
		return redirect()->route('projects.show',[$idProject]);
	}
}
