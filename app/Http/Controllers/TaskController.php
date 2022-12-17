<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Project $project, StoreTaskRequest $request)
    {
        $data = [
            'project_id' => $project->id,
            'body' => $request->body,
        ];
        Task::create($data);
        return back();
    }

    public function update(Project $project, Task $task, Request $request)
    {
        $data = ['done' => $request->has('done')];
        $task->update($data);

        return back();
    }

    public function destroy(Project $project, Task $task)
    {
        $task->delete();
        return redirect('/projects/' . $project->id);
    }
}
