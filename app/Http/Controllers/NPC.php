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

        //FIRST CHECK IF THE USER HAS ENOUGH GOLD TO PURHCASE 
        if ($user["ponygold"] < $item[0]["price"] || $item[0]["stock"] == 0) {
            //IF THE SHOP HAS NO STOCK THEN RETURN ERROR
            if ($item[0]["stock"] == 0) {
                return redirect('/shop/whisk')->with('error', 'Sorry :  ' . $item[0]["itemname"] . ' is out of stock :(');
            }
            //IF USER HAS NOT ENOUGH MONEY RETURNN ERROR
            else {
                return redirect('/shop/whisk')->with('error', 'Not enough pony gold to purchase:  ' . $item[0]["itemname"]);
            }
        } else {
            event(new PurchaseItem($user, $item[0]));
            return redirect('/shop/whisk')->with('success', 'Successfully purchased ' . $item[0]["itemname"]);
        }
    }
}
