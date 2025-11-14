<?php
// controller

namespace App\Http\Controllers;
use App\Models\task;
use Illuminate\Http\Request;
use Illuminate\Support\Str;   // Para Str::uuid()
use Illuminate\Support\Facades\Auth; // Para Auth::id()


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasksFile = storage_path('tasks.json');

        if (!file_exists($tasksFile)) {
            file_put_contents($tasksFile, json_encode([]));
        }

        $tasks = json_decode(file_get_contents($tasksFile), true) ?? [];

        // Filtrar solo tareas del usuario autenticado
        $userTasks = array_filter($tasks, fn($task) => $task['user_id'] == Auth::id());

        $taskCount = count($userTasks);
        $userTask = Auth::user();
        $activeTab = 'overview';

        return view('task.index', [
            'tasks' => $userTasks,
            'taskCount' => $taskCount,
            'userTask' => $userTask,
            'activeTab' => $activeTab
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'label' => 'nullable|string|max:100',
            'description' => 'nullable|string',
        ]);
        // Reads the contents of the tasks.json file.
        // Converts it into a PHP array.
        // If the file is empty or contains invalid JSON, ensures $tasks is an empty array.
        $tasksFile = storage_path('tasks.json');

        if (!file_exists($tasksFile)) {
            file_put_contents($tasksFile, json_encode([]));
        }

        $tasks = json_decode(file_get_contents($tasksFile), true) ?? [];

        // Generate a unique ID for the task
        do {
            $id = Str::random(8); // ID de 8 caracteres
        } while (collect($tasks)->pluck('id')->contains($id));

        $tasks[] = [
            'id' => $id,
            'user_id' => Auth::id(),
            'title' => $request->title,
            'label' => $request->label ?? 'pending',
            'description' => $request->description
        ];

        file_put_contents($tasksFile, json_encode($tasks));

        return redirect('/');
    }


    /**
     * Display the specified resource.
     */
    public function show(task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(task $task)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(task $task)
    {
        //
    }

    public function start($taskId)
    {
        $tasksFile = storage_path('tasks.json');
        $tasks = json_decode(file_get_contents($tasksFile), true) ?? [];

        // Search the task for user and id
        foreach ($tasks as &$task) {
            if ($task['id'] === $taskId && $task['user_id'] == Auth::id()) {
                $task['label'] = 'inprogress';
                break;
            }
        }

        // save change
        file_put_contents($tasksFile, json_encode($tasks));

        return redirect()->back()->with('success', 'Task started!');
    }
    public function complete($taskId)
    {
        $tasksFile = storage_path('tasks.json');
        $tasks = json_decode(file_get_contents($tasksFile), true) ?? [];

        // Search the task for user and id
        foreach ($tasks as &$task) {
            if ($task['id'] === $taskId && $task['user_id'] == Auth::id()) {
                $task['label'] = 'complete';
                break;
            }
        }

        // save change
        file_put_contents($tasksFile, json_encode($tasks));

        return redirect()->back()->with('success', 'Task started!');
    }
}
