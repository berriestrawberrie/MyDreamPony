<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Pony;
use App\Models\SpecialTrait;
use App\Models\UserItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PonyController extends Controller
{

    public function reponyProfile($ponyID)
    {
        if (Auth::check()) {
            $user = Auth::User();
            $useritems = UserItem::where('userid', $user["id"])->get();
            $itemslist = explode(',', $useritems[0]["itemid"]);
            $qtylist = explode(',', $useritems[0]["qty"]);
            $items = Item::wherein('itemid', $itemslist)
                ->get();
            $ponys = Pony::where('ponyid', $ponyID)->get();
            $traits = SpecialTrait::all();
            $mypony = $ponys;
            $shown = explode(',', $ponys[0]['specialtrait']);
            $carry = explode(',', $ponys[0]['genes']);
            return view(
                'REDESIGN.ponyprofile',
                ['ponys' => $mypony, 'traits' => $traits, 'shown' => $shown, 'carry' => $carry, 'group' => $items, 'qtylist' => $qtylist]
            );
        }
        return view('REDESIGN.home');
    } //END OF REPONYPROFILE


    //DISPLAY THE PROFILE PAGE AND UPDATES?
    public function ponyProfile($ponyID)
    {
        $user = Auth::user();
        $useritems = UserItem::where('userid', $user["id"])->get();
        $itemslist = explode(',', $useritems[0]["itemid"]);
        $qtylist = explode(',', $useritems[0]["qty"]);
        $items = Item::wherein('itemid', $itemslist)
            ->get();
        $ponys = Pony::where('ponyid', $ponyID)->get();
        $traits = SpecialTrait::all();
        $mypony = $ponys;
        $shown = explode(',', $ponys[0]['specialtrait']);
        $carry = explode(',', $ponys[0]['genes']);
        return view(
            'templates.ponyprofile',
            ['ponys' => $mypony, 'traits' => $traits, 'shown' => $shown, 'carry' => $carry, 'group' => $items, 'qtylist' => $qtylist]
        );
    }

    public function renextPony($stable, $current)
    {
        $user = Auth::user();
        //GET THE PONY LIST AND STABLE ORDER
        $ponys = Pony::where('ownerid', $user["id"])
            ->where('stable_assign', $stable)
            ->orderby('stable_ord')->get();
        $ponylist = [];
        $stablelist = [];
        for ($i = 0; $i < count($ponys); $i++) {
            $stablelist[$i] = $ponys[$i]["stable_ord"];
            $ponylist[$i] = $ponys[$i]["ponyid"];
        }

        //FIND THE INDEX OF THE CURRENT PONY
        $find = array_search($current, $ponylist);
        //CHECK IF YOU ARE AT THE END OF THE STABLE ORDER THEN RESET
        if ($find == (count($ponylist) - 1)) {
            $next = 0;
        } else {
            $next = $find + 1;
        }

        $nextpony = $ponylist[$next];


        return $this->reponyProfile($nextpony);
    }

    public function repreviousPony($stable, $previous)
    {

        $user = Auth::user();
        //GET THE PONY LIST AND STABLE ORDER
        $ponys = Pony::where('ownerid', $user["id"])
            ->where('stable_assign', $stable)
            ->orderby('stable_ord')->get();
        $ponylist = [];
        $stablelist = [];
        for ($i = 0; $i < count($ponys); $i++) {
            $stablelist[$i] = $ponys[$i]["stable_ord"];
            $ponylist[$i] = $ponys[$i]["ponyid"];
        }

        //FIND THE INDEX OF THE CURRENT PONY
        $find = array_search($previous, $ponylist);
        //CHECK IF YOU ARE AT THE END OF THE STABLE ORDER THEN RESET
        if ($find == 0) {
            $next = count($ponylist) - 1;
        } else {
            $next = $find - 1;
        }

        $nextpony = $ponylist[$next];


        return $this->reponyProfile($nextpony);
    }
    public function nextPony($current)
    {
        $user = Auth::user();
        //GET THE PONY LIST AND STABLE ORDER
        $ponys = Pony::where('ownerid', $user["id"])->orderby('stable')->get();
        $ponylist = [];
        $stablelist = [];
        for ($i = 0; $i < count($ponys); $i++) {
            $stablelist[$i] = $ponys[$i]["stable"];
            $ponylist[$i] = $ponys[$i]["ponyid"];
        }

        //FIND THE INDEX OF THE CURRENT PONY
        $find = array_search($current, $ponylist);
        //CHECK IF YOU ARE AT THE END OF THE STABLE ORDER THEN RESET
        if ($find == (count($ponylist) - 1)) {
            $next = 0;
        } else {
            $next = $find + 1;
        }

        $nextpony = $ponylist[$next];


        return $this->ponyProfile($nextpony);
    }


    public function previousPony($previous)
    {
        $user = Auth::user();
        //GET THE PONY LIST AND STABLE ORDER
        $ponys = Pony::where('ownerid', $user["id"])->orderby('stable')->get();
        $ponylist = [];
        $stablelist = [];
        for ($i = 0; $i < count($ponys); $i++) {
            $stablelist[$i] = $ponys[$i]["stable"];
            $ponylist[$i] = $ponys[$i]["ponyid"];
        }

        //FIND THE INDEX OF THE CURRENT PONY
        $find = array_search($previous, $ponylist);
        //CHECK IF YOU ARE AT THE END OF THE STABLE ORDER THEN RESET
        if ($find == 0) {
            $next = count($ponylist) - 1;
        } else {
            $next = $find - 1;
        }

        $nextpony = $ponylist[$next];


        return $this->ponyProfile($nextpony);
    }

    public function unequipItem(Request $request, int $ponyid)
    {
        $user = Auth::user();
        $details = UserItem::where('userid', $user["id"])->get();
        $equip = ["Bodyware", "Faceware", "Tailware", "Neckware", "Hooveware", "Headware"];

        $useritems = explode(',', $details[0]["itemid"]);
        $userqty = explode(',', $details[0]["qty"]);
        $finditem = [];


        for ($i = 0; $i < count($equip); $i++) {

            if ($request->input($equip[$i])) {
                //UNEQUIP FROM PONY ROW
                Pony::where('ponyid', $ponyid)
                    ->update([$equip[$i] => null]);
                //IDENTIFY THE ITEMS THAT NEED TO BE REDUCED
                array_push($finditem, array_search($request->input($equip[$i]), $useritems));
            } //END OF IF
        } //END OF FOR LOOP

        for ($i = 0; $i < count($finditem); $i++) {

            $item = $finditem[$i];
            $userqty[$item] = $userqty[$item] + 1;
        }
        //DOES NOT DELETE ITEMS IF THE ARE 0
        $newqtylist = implode(",", $userqty);
        UserItem::where('userid', $user["id"])
            ->update(['qty' => $newqtylist]);


        return $this->ponyProfile($ponyid);
    } //END OF EQUIP FUNCTION

    public function equipItem(Request $request, int $itemid)
    {
        //GET THE ITEM 
        $item = Item::where('itemid', $itemid)->get();
        //GET THE PONY
        $ponyid = $request->input("ponychoice");
        $pony = Pony::where('ponyid', $ponyid)->get();


        $type = $item[0]["itemtype"];
        //CHECK IF THE PONY HAS AN ITEM IN THAT SLOT
        if ($pony[0][$type]) {
            //UNEQUIP CURRENT ITEM IN SLOT
            $worn = $pony[0][$type];
            //PULL THE USER ITEM LIST& QTY LIST
            $user = UserItem::where('userid', $pony[0]["ownerid"])->get();
            $useritems = explode(',', $user[0]["itemid"]);
            $userqty = explode(',', $user[0]["qty"]);
            //FIND THE ITEM TO UNEQUIP
            $index = array_search($worn, $useritems);
            //ADD IT BACK TO QTY
            $userqty[$index] = $userqty[$index] + 1;

            //REMOVE THE NEW ITEM FROM THE QTY
            $newindex = array_search($itemid, $useritems);
            $userqty[$newindex] = $userqty[$newindex] - 1;

            $newqtylist = implode(',', $userqty);
            //UPDATE THE DB
            UserItem::where('userid', $pony[0]["ownerid"])
                ->update(['qty' => $newqtylist]);

            //ADD THE ITEM TO THE PONY 
            Pony::where('ponyid', $ponyid)
                ->update([$type => $itemid]);

            return $this->ponyProfile($ponyid);
        } else {
            //PULL THE USER ITEM LIST& QTY LIST
            $user = UserItem::where('userid', $pony[0]["ownerid"])->get();
            $useritems = explode(',', $user[0]["itemid"]);
            $userqty = explode(',', $user[0]["qty"]);

            //REMOVE THE NEW ITEM FROM THE QTY
            $newindex = array_search($itemid, $useritems);
            $userqty[$newindex] = $userqty[$newindex] - 1;

            $newqtylist = implode(',', $userqty);
            //UPDATE THE DB
            UserItem::where('userid', $pony[0]["ownerid"])
                ->update(['qty' => $newqtylist]);
            //ADD THE ITEM TO THE PONY 
            Pony::where('ponyid', $ponyid)
                ->update([$type => $itemid]);
            return $this->ponyProfile($ponyid);
        }
    }

    public function equipForm($itemid)
    {
        $user = Auth::user();
        $ponys = Pony::where('ownerid', $user["id"])->get();
        $item = Item::where('itemid', $itemid)->get();
        return view('users.equip',  compact('user', 'item', 'ponys'));
    }
}
