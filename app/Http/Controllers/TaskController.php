<?php

namespace App\Http\Controllers;

use App\Models\Buiness;
use App\Models\Person;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::get();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request ){
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
       $target_model = match($request->input('taskable_type')){
        'business' => Buiness::find($request->taskable_id),
        'person' => Person::find($request->taskable_id),
       };

       $target_model->tasks()->create([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
       ]);

       return to_route('task.index');
    }
}
