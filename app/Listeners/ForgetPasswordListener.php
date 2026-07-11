<?php

namespace App\Listeners;

use App\Events\ForgrtPasswordEvent;
use App\Mail\ForgetPasswordMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordListener implements ShouldQueue
{
    use InteractsWithQueue;

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
    public function handle(ForgrtPasswordEvent $event): void
    {
        Mail::to($event->user->email)
            ->send(new ForgetPasswordMail($event->user, $event->link));
    }
}
