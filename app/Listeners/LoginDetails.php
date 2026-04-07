<?php

namespace App\Listeners;

use App\Models\AuditTrail;
use App\Events\AuditTrails;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LoginDetails
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
    public function handle( AuditTrails $event): void
    {
        //

         AuditTrail::create([
            'user' =>  $event->user,
            'action' => $event->action,
            'module' => $event->module,
            'description' => $event->description,
        ]);
    }
}
