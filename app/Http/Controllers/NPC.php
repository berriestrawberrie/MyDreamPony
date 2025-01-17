<?php

namespace App\Http\Controllers;

use App\Events\PurchaseItem;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class NPC extends Controller
{
    //
    public function itemPurchase(int $id)
    {
        $item = Item::where('itemid', $id)->get();
        $user = Auth::user();
        event(new PurchaseItem($user, $item[0]));


        return redirect('/shop/whisk')->with('success', 'Successfully purchased ' . $item[0]["itemname"]);
    }
}
