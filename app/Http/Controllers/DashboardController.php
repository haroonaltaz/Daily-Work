<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $tasks = $user->tasks()->latest()->get();

        $totalTasks = $tasks->count();

        $completedTasks = $tasks->where('status', 'completed')->count();

        $inProgressTasks = $tasks->where('status', 'in_progress')->count();

        $pendingTasks = $tasks->where('status', 'pending')->count();

        $completionPercentage = $totalTasks > 0
            ? round(($completedTasks / $totalTasks) * 100)
            : 0;

        return view('dashboard', compact(
            'tasks',
            'totalTasks',
            'completedTasks',
            'inProgressTasks',
            'pendingTasks',
            'completionPercentage'
        ));
    }
}