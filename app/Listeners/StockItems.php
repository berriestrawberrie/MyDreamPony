<?php

namespace App\Listeners;

use App\Events\NPCRestock;
use App\Models\Item;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StockItems
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
    public function handle(NPCRestock $event): void
    {
        $items = Item::where('npc', $event->npc)->get();

        for ($i = 0; $i < count($items); $i++) {
            //COMMON ITEMS
            if ($items[$i]["rarity"] == "common") {
                Item::where('itemid', $items[$i]["itemid"])
                    ->update(['stock' => rand(8, 15)]);
            }
            //UNCOMMON ITEMS
            if ($items[$i]["rarity"] == "uncommon") {
                Item::where('itemid', $items[$i]["itemid"])
                    ->update(['stock' => rand(5, 10)]);
            }
            //RARE ITEMS
            if ($items[$i]["rarity"] == "rare") {
                Item::where('itemid', $items[$i]["itemid"])
                    ->update(['stock' => rand(0, 4)]);
            }
        } //END OF FOR
        logger('NPC Shop Stocked: ' . $event->npc);
    }
}
