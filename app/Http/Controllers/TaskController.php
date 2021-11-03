<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$data = Task::orderBy('status', 'ASC')->latest();
	
		if(request('query')) {
			$data = $data->where('task', 'LIKE', '%'. request('query') . '%');
		}
		
		$data = $data->get();

		return response()->json($data, 200);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		Task::create([
			'task' => $request->task
		]);

		return response()->json('Task Created!', 201);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$data = Task::find($id);

		return response()->json($data, 200);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$task = Task::firstWhere('id', $id);

		$task->status = $task->status = !$task->status;
		$task->save();

		return response()->json('Status Updated!', 204);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		Task::firstWhere('id', $id)->update([
			'task' => $request->task
		]);

		return response()->json('Task Updated!', 204);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		Task::find($id)->delete();

		return response()->json('Task Deleted!', 204);
	}
}
