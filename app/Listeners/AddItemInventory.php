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
            //CHECK IF USER HAS ITEMS
            if (!$itemlist) {
                //ADD QTY OF 1 TO THE END
                array_push($qtylist, 1);
                //ADD ITEM ID TO THE ITEM LIST
                array_push($itemlist, $item);
                //CONVERT TO STRINGS FOR DB
                $newqtylist = implode(',', $qtylist);
                $newitemlist = implode(',', $itemlist);
            }
            //IF USER HAS NO ITEMS
            else {
                $newqtylist = "1";
                $newitemlist = $item;
            }


            //UPDATE THE DB
            User::where('id', $event->user['id'])
                ->update(['qty' => $newqtylist, 'itemid' => $newitemlist]);
        }
    }
}
