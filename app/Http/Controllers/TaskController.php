<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Dentro\Yalr\Attributes\Get;
use Dentro\Yalr\Attributes\Middleware;

class TaskController extends Controller
{
    #[Get('tasks')]
    public function index(Request $request){
        if($request->search){
            $task =Task::where('task', 'LIKE', "%$request->search%")
                ->paginate(5);
            
            return $task;
        };
    
        $task = Task::paginate(5);
        return view('task.index',[
            'data' => $task,
        ]);
    }
}
