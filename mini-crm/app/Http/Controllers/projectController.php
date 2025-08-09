<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'clients' => Client::all(),
            'tasksToday' => Task::whereDate('due_date', now())->get(),
            'overdueTasks' => Task::where('due_date', '<', now())->where('status', '!=', 'done')->get(),
            'totalProjects' => Project::count(), // For example
        ]);
    }
}
