<?php

namespace App\Listeners;

use App\Events\UserHasRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUserMail;

class SendWelcomeEmail
{
    public function handle(UserHasRegistered $eventDetail)
    {
       
        try {
          
              
            Mail::to($eventDetail->email)->send(new NewUserMail());
           
           
        } catch (\Throwable $e) {
            throw $e;
        }
    }
}
