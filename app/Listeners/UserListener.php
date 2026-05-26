<?php

namespace App\Listeners;

use App\Events\UserEvent;
use App\Models\ActivityLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserListener
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
    public function handle(UserEvent $event): void
    {
        $changeDetails = '';

    foreach ($event->changes as $field => $values) {
             $changeDetails .= $field . ': ' . $values['old'] . ' → ' . $values['new'] . ', ';
          }

          
        ActivityLog::create([
            'user_id' =>  $event->user->id,
            'action'  =>  $event->user->username.' Updated their record '. $event->user->fullname,
            'details' => 'User: ' . $event->user->id .
                     ' | Changes: ' . $changeDetails,
        ]);
    }
}
