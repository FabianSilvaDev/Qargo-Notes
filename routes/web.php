<?php
// modell
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;



// Route::get('/', function () {
//     return view('task.index');
// });

// Route::post('/', function(){
//     print_r($_POST);
// });

// Rutas públicas
// Rutas públicas
Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.post');

Route::middleware('auth')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
    Route::post('/', [TaskController::class, 'store'])->name('tasks.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('home');
});

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::patch('/tasks/{task}/start', [TaskController::class, 'start'])->name('tasks.start');

Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');

Route::patch('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');

Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
