<?php


namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
{
    $user = Auth::user();
    
  
        
    

    // Admin sees all, agents see only their own
    $clients = $user->is_admin
        ? Client::all()
        : Client::where('user_id', $user->id)->get();

    $tasksToday = Task::whereDate('due_date', now())
        ->when(!$user->is_admin, fn($q) => $q->whereHas('client', fn($q) => $q->where('user_id', $user->id)))
        ->get();

    $overdueTasks = Task::whereDate('due_date', '<', now())
        ->where('status', '!=', 'completed')
        ->when(!$user->is_admin, fn($q) => $q->whereHas('client', fn($q) => $q->where('user_id', $user->id)))
        ->get();

    return view('dashboard', [
            'clients' => Client::all(),
            'tasksToday' => Task::whereDate('due_date', now())->get(),
            'overdueTasks' => Task::where('due_date', '<', now())->where('status', '!=', 'done')->get(),
            'totalProjects' => Project::count(), // For example
        ]);
}

}
