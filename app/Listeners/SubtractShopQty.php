<?php

namespace App\Listeners;

use App\Events\PurchaseItem;
use App\Models\Item;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SubtractShopQty
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
    public function handle(PurchaseItem $event): void
    {
        //SUBTRACT THE 1 FROM STOCK
        $newStock = $event->item['stock'] - 1;

        //UPDATE THE STOCK IN THE SHOP
        Item::where('itemid', $event->item['itemid'])
            ->update(['stock' => $newStock]);
    }
}
