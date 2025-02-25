<?php

namespace App\Http\Controllers;

use App\Events\PurchaseItem;
use App\Models\Item;
use App\Models\Pony;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{


    public function showRegistrationForm()
    {

        return view('auth.register');
    }

    public function myStables()
    {
        $user = Auth::user();
        $ponys = Pony::where('ownerid', $user["id"])->orderBy('stable')->get();

        return view('templates.stables', ['user' => $user], ['ponys' => $ponys]);
    }

    public function myInventory()
    {
        $user = Auth::user();
        $inventory = User::where('id', $user["id"])->get();

        $itemlist = explode(',', $inventory[0]["itemid"]);
        $qtylist = explode(',', $inventory[0]["qty"]);


        $group = Item::wherein('itemid', $itemlist)->get();
        $tags = [];

        for ($i = 0; $i < count($group); $i++) {
            array_push($tags, explode(',', $group[$i]["tags"]));
        }

        return view('users.inventory', compact('user', 'group', 'qtylist', 'tags'));
    }

    public function updateStables(Request $request)
    {

        for ($i = 0; $i < count($request["order"]); $i++) {

            $ponyid = $request["order"][$i][0];
            $stable = $request["order"][$i][1];
            Pony::where('ponyid', $ponyid)
                ->update(['stable' => $stable]);
        }
        return "stable order";
    }

    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'birthday' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
        return redirect('/blade')->with('success', 'Registration successful! Please log in.');
    }

    public function login(Request $request)
    {
        $credientials = $request->only('name', 'password');
        if (Auth::attempt($credientials)) {
            $user = Auth::user();

            return view('templates.logged', compact('user'));
        }
        return redirect('/')->with('error', 'Invalid credentials. Please try again.');
    }

    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function homepage()
    {
        $user = Auth::user();
        return view('auth.home', ['user' => $user]);
    }

    public function explore()
    {
        $user = Auth::user();
        return view('explore.landing', compact('user'));
    }

    public function npcShop($npc)
    {
        $items = Item::where('npc',  $npc)->get();
        $common_stock = Item::where('npc', $npc)
            ->where('rarity', 'common')->get();
        $uncommon_stock = Item::where('npc', $npc)
            ->where('rarity', 'uncommon')->get();
        $rare_stock = Item::where('npc', $npc)
            ->where('rarity', 'rare')->get();


        //DETERMINE HOW MANY OF EACH ITEM TO STOCK
        for ($i = 0; $i < count($common_stock); $i++) {
            $common_stock[$i]["stock"] = rand(8, 16);
        }
        for ($i = 0; $i < count($uncommon_stock); $i++) {
            $uncommon_stock[$i]["stock"] = rand(5, 10);
        }
        for ($i = 0; $i < count($rare_stock); $i++) {
            $rare_stock[$i]["stock"] = rand(1, 3);
        }


        $user = Auth::user();

        $tags = [];

        for ($i = 0; $i < count($items); $i++) {
            array_push($tags, explode(',', $items[$i]["tags"]));
        }

        return view('explore.' . $npc, compact('user', 'items', 'tags', 'npc'));
    }
    public function avatardesgin()
    {
        $user = Auth::User();
        return view('templates.dressup', compact('user'));
    }
}
