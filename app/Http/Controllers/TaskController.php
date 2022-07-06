<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Dentro\Yalr\Attributes\Get;
use Dentro\Yalr\Attributes\Post;
use Dentro\Yalr\Attributes\Patch;
use Dentro\Yalr\Attributes\Delete;
use App\Http\Requests\TaskRequest;
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

    #[Get('tasks/create')]
    public function create(){
        return view('task.create');
    }

    #[Get('tasks/{id}')]
    public function show($id){
        $task = Task::find($id);
        return $task;
    }

    #[Get('tasks/{id}/edit')]
    public function edit($id){
        $task = Task::find($id);
        return view('task.edit', compact('task'));
    }

    #[Post('tasks')]
    public function store(TaskRequest $request){
        Task::create([
            'task' => $request->task,
            'user'=> $request->user
        ]);

        return redirect('/tasks');
    }

    #[Patch('tasks/{id}')]
    public function update(TaskRequest $request, $id){
        $task = Task::find($id);
        
        $task->update([
            'task'=> $request->task,
            'user'=>$request->user
        ]);

        return redirect('/tasks');
    }

    #[Delete('tasks/{id}')]
    public function destroy($id){
        $task = Task::find($id);
        $task->delete();
        return redirect('/tasks');
    }
}
