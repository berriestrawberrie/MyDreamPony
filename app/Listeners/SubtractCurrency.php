<?php

namespace App\Listeners;

use App\Events\PurchaseItem;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SubtractCurrency
{


    /**
     * Handle the event.
     */
    public function handle(PurchaseItem $event): void
    {
        //FIND THE COST OF THE ITEM
        $cost =  $event->item['price'];
        //HOW MUCH DOES THE USER CURRENTLY HAVE?
        $purse = $event->user['ponygold'];

        //SUBTRACT THE COST OF THE ITEM FFROM USER
        $newPurse = $purse - $cost;

        //UPDATE THE DB WITH NEW USER CURRENCY AMOUNT
        User::where('id', $event->user['id'])
            ->update(['ponygold' => $newPurse]);
    }
}
