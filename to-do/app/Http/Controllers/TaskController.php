<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks=Task::where('userId',auth()->user()->id)->latest()->get();
        return view('dashboard',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'deadline' => 'nullable|date',
        ]);
        $task=new Task();
        $task->title=$request->title;
        $task->description=$request->description;
        $task->deadline=$request->deadline;
        $task->userId=auth()->user()->id;
        $task->save();

        return back()->with('message','Tasks added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'deadline' => 'nullable|date',
        ]);

        $task = Task::findOrFail($id);
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->deadline = $request->input('deadline');
        $task->save();

        return redirect()->route('dashboard')->with('message', 'Task updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task=Task::findOrFail($id);
        $task->delete();
        return back()->with('message','Task removed');
    }
    public function changeStatus($id){
        $task=Task::findOrFail($id);
        if($task->status===0){
            $task->status=1;
        }
        else{
            $task->status=0;
        }
        $task->save();
        return back();
    }
}
