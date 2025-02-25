<?php

use App\Events\NPCRestock;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;


Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

//RESTOCK THE NPC SHOPS EVERY FIFTEEN MINUTES
Schedule::call(function () {
    event(new NPCRestock('whisk'));
    event(new NPCRestock('claws'));
    event(new NPCRestock('farmer'));
})->everyFifteenMinutes();
