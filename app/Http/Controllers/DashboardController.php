<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        // Получение данных из базы данных
        $expiredTasks = Task::where('due_date', '<', now())->get();
        $tasksToday = Task::whereDate('due_date', now())->get();
        $tasksTomorrow = Task::whereDate('due_date', now()->addDay())->get();
        $deferredTasks = Task::where('status', 'deferred')->get();

        return view('dashboard', [
            'expiredTasks' => $expiredTasks,
            'tasksToday' => $tasksToday,
            'tasksTomorrow' => $tasksTomorrow,
            'deferredTasks' => $deferredTasks,
        ]);
    }
}
