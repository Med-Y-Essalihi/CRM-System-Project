<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TaskDueNotification extends Notification
{
    use Queueable;

    protected $task;

    public function __construct($task)
    {
        $this->task = $task;
    }

    public function toDatabase($notifiable)
{
    return [
        'task_id' => $this->task->id,
        'title' => $this->task->title,
        'due_date' => $this->task->due_date->toDateString(),
        'message' => 'The task "' . $this->task->title . '" is due today.',
    ];
}

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }


    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Task Due Today: ' . $this->task->title)
            ->greeting('Hello ' . $notifiable->name)
            ->line('The task "' . $this->task->title . '" is due today.')
            ->action('View Task', url('/tasks/' . $this->task->id))
            ->line('Please make sure to complete it on time!');
    }
}
