<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class NPC extends Controller
{
    //
    public function itemPurchase(int $id)
    {

        $item = Item::where('itemid', $id)->get();
        $user = Auth::user();


        return redirect('/shop/whisk')->with('success', 'Successfully purchased ' . $item[0]["itemname"]);
    }
}
