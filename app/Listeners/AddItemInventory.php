<?php

namespace App\Listeners;

use App\Events\PurchaseItem;
use App\Models\User;

class AddItemInventory
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
        //PULL THE USER LISTS INTO ARRAYS
        $qtylist = explode(',', $event->user['qty']);
        $itemlist = explode(',', $event->user['itemid']);

        //FIND THE ITEM & QTY TO UPDATE
        $item = $event->item['itemid'];

        //FIRST CHECK IF THE USER OWNS THE ITEM
        if (in_array($item, $itemlist)) {
            $index = array_search($item, $itemlist);
            //ADD TO THE QTY
            $qtylist[$index] = $qtylist[$index] + 1;
            //RECOMBINE THE STRING
            $newqtylist = implode(',', $qtylist);
            //UPDATE THE DB
            User::where('id', $event->user['id'])
                ->update(['qty' => $newqtylist]);
        }
        //ITEM IS NOT IN THE USER LIST SO ADD
        else {
        }
    }
}
