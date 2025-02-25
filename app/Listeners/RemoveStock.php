<?php

namespace App\Listeners;

use App\Events\Unstock;
use App\Models\Item;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RemoveStock
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
    public function handle(Unstock $event): void
    {
        //GET THE ITEMS THAT ARE TO BE ZEROED OUT
        Item::where('npc', $event->npc)
            ->update(["stock" => 0]);
    }
}
