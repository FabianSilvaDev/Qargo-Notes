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
        $user = Auth::user();

        // Obtener todas las tareas del usuario
        $tasks = Task::where('user_id', $user->id)->get();

        $taskCount = $tasks->count();
        $activeTab = 'overview';

        // dd($tasks);

        return view('task.index', [
            'tasks' => $tasks,
            'taskCount' => $taskCount,
            'userTask' => $user,
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
            'description' => 'nullable|string',
            'priority' => 'nullable|string',
        ]);

        $task = Task::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority ?? 'Normal',
            // 'label' se llenará automáticamente con 'pendiente'
        ]);

        return redirect()->back()->with('success', 'Tarea creada correctamente.');
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
    public function update(Request $request, Task $task)
    {
        // Verificar que el usuario autenticado sea dueño de la tarea
        if ($task->user_id !== Auth::id()) {
            abort(403, 'No autorizado');
        }

        // Validar datos
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'nullable|string',
            'label' => 'nullable|string',
        ]);

        // Actualizar tarea
        $task->update($request->only('title', 'description', 'priority', 'label'));

        return redirect()->back()->with('success', 'Tarea actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return back()->with('success', 'Task deleted successfully.');
    }

    public function start($taskId)
    {
        $task = Task::where('id', $taskId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $task->label = 'inprogress';
        $task->save();

        return redirect()->back()->with('success', 'Task started!');
    }

    public function complete($taskId)
    {
        $task = Task::where('id', $taskId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $task->label = 'complete';
        $task->save();

        return redirect()->back()->with('success', 'Task completed!');
    }
}
