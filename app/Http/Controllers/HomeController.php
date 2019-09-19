<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    
    public function store(Request $request)
    {
        $task = new Task();
        $task->title = $request->title;
        $task->status = 0;
        $task->save();
        
        return['msg' => 'successfull'];
    }
    
    public function show()
    {
        $tasks = Task::where('status',0)->get();
        return response()->json([
            'tasks' => $tasks
        ],200);
    }
    
    public function done($id)
    {
        $task = Task::findOrFail($id);
        
        $task->status = 1;
        $task->save();
        
        return['msg' => 'task done'];
    }
    
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
    }
}
