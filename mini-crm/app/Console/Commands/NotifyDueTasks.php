<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use Carbon\Carbon;

class NotifyDueTasks extends Command
{
    protected $signature = 'tasks:notify-due';

    protected $description = 'Send notifications for tasks due today';

    public function handle()
    {
        $today = Carbon::today();

        $tasksDue = Task::whereDate('due_date', $today)
                        ->where('status', '!=', 'completed') // adjust your status column as needed
                        ->get();

        foreach ($tasksDue as $task) {
            $user = $task->user;

            if ($user) {
                $user->notify(new \App\Notifications\TaskDueNotification($task));
                $this->info('Notification sent to ' . $user->email . ' for task "' . $task->title . '"');
            }
        }

        $this->info('Task due notifications sent.');
    }
  

}
