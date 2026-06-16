<?php

namespace App\Listeners;

use App\Events\SentRegistrationEvent;
use App\Mail\RegistrationEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SentRegistrationListener
{

    use InteractsWithQueue;
    public function __construct()
    {

    }

    public function handle(SentRegistrationEvent $event): void
    {
        Mail::to($event->data->email)->send(new RegistrationEmail($event->data));
    }
}
