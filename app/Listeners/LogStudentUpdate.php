<?php

namespace App\Listeners;
use App\Models\ActivityLog;
use App\Events\StudentUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogStudentUpdate
{
    /**
     * Create the event listener.
     */
        

    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(StudentUpdated $event): void
    {
        ActivityLog::create([
            'user_id' => $event->user->id,
            'action'  => 'Updated student record',
            'details' => 'Student: ' . $event->student->student_number,
        ]);

    }
}
