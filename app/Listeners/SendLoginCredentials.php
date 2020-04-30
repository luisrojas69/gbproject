<?php

namespace App\Listeners;

use App\Event\Events\UserWasCreated;
use App\Mail\LoginCredentials;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendLoginCredentials
{
  
      /**
     * Handle the event.
     *
     * @param  UserWasCreated  $event
     * @return void
     */
    public function handle(UserWasCreated $event)
    {
        //dd($event->user->toArray(), $event->password);
        
        //Enviamos el Email
        Mail::to($event->user)->queue(
            new LoginCredentials($event->user, $event->password)
        );

    }
}
