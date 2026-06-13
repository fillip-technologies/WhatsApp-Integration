<?php

namespace App\Listeners;

use App\Events\RestrationEvent;
use App\Mail\RegistrationEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class RegistrationListener
{
    use InteractsWithQueue;

    public function __construct()
    {

    }
    public function handle(RestrationEvent $event): void
    {
       Mail::to($event->data->email)->send(new RegistrationEmail($event->data));
    }
}
