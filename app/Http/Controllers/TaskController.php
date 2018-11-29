<?php

namespace App\Http\Controllers;
use App\Task;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $tasks = Task::all();
        return view('welcome',compact('tasks'));
    }

    public function store(Request $request){
            $task= new Task;
            $task->name = $request->name;
            $task->save();
            return redirect('/');
    }

    public function destroy($id){
        Task::find($id)->delete();
        return redirect ('/');
    }
}
