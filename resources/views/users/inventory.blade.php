@extends('config3')
@section('title')Inventory @endsection



@section('money')
<div class="mail">
    <img src="{{asset('storage/mail.png')}}">
    @if($user["message"]>0)
    <img src="{{asset('storage/alert.png')}}" style="margin-left: -55px; margin-top: -20px;">
    @endif
</div> 

<div class="gold">
    <span style="background-color: white; border-radius: 5px; padding: 2px;" >{{$user["ponygold"]}}</span> <img src="{{asset('storage/coin.png')}}" width="40px">
</div> 
<div class="crystalheart">
    <span style="background-color: white; border-radius: 5px; padding: 2px" >{{$user["crystalheart"]}}</span> <img src="{{asset('storage/crystalheart.png')}}" width="40px">
</div> 
@endsection

@section('logout')
<form action="{{route('logout')}}" method="POST">
    @csrf
    @method('POST')
    <button type="submit" class="button-8">Logout</button>
</form>
<a href="{{route('admin.index')}}" ><button class="button-8">Admin</button></a>
@endsection

@section('content')
{{$user}}
@endsection


@section('config3')
<h2>{{$user->name}}'s Inventory</h2>
<div class="inventoryfilter">

        <div id="inventorynav">
            <button class="button-8">Stock Shop</button>
            <button class="button-8">Crafting</button>
            <button class="button-8">Gallery</button>
        </div>

        <label for="type">Filter Type</label>
        <select onchange="selectFilter()"  id="filter-type" name="item_filter" class="filter-type">
            <option value="None" selected>None</option>
            <option value="Food">Food</option>
            <option value="Faceware">Faceware</option>
            <option value="Headware">Headware</option>
            <option value="Bodyware">Bodyware</option>
            <option value="Neckware">Neckware</option>
            <option value="Tailware">Tailware</option>
        </select>

        <label for="sort">Sort</label>
        <select id="sort" name="item_sort">
            <option>None</option>
            <option>Qty</option>
            <option>A-Z</option>
        </select>
  
</div>
<!--WRAP EACH DIV TOGETHER -->
<div  style="display: flex; flex-wrap: wrap; width: 100%;">
        <!-- MAKE THE ITEMS -->
        @for($i = 0 ; $i < count($group); $i++)
        <!--ITEM BLOCK-->
        <!--ITEM BLOCK START-->
            <div onclick="showMenu({{$i}})" class="None filter {{$group[$i]["itemtype"]}}" id="inventorywrap">
                <div class="invetorydiv" >
                    {{$group[$i]["itemname"]}}
                    <div style="background-color: #77C6FF75; border-style:double;
                    border-color: #314D61; border-radius: 20px; height: 130px; width: 130px; margin-left: auto; margin-right: auto;">
                        <div style="margin: 10px; position: absolute; background-color: #fff; border-radius: 5px; height: 20px; text-align: center; padding: 2px;">{{$qtylist[$i]}}</div>
                   
                        <img  class="item" src="/item/{{$group[$i]["itemid"]}}/icon" width="120;"  >
                    </div>
                    <span style="color: black; font-weight: bold;text-transform:capitalize;"> {{$group[$i]["rarity"]}}</span>
                </div>
                    <div class="hide">  
                        <b>Description:</b>{{$group[$i]["info"]}}<br>
                        @foreach($tags[$i] as $tag)
                        <div>{{$tag}}</div>   
                        @endforeach
                    </div>
                    <div class="itemmenu " id="{{$i}}">
                        <ul>
                            <li><a href="/equipForm/{{$group[$i]["itemid"]}}">Equip</a></li>
                            <li>Sell</li>
                            <li>Discard</li>
                            <li>Showcase</li>
                            <li>Transfer</li>

                        </ul>
                    </div>
                <!--ITEM BLOCK END-->
            </div><!--END OF INDIVIDUAL ITEM DIV -->
        @endfor

</div> <!--END OF INVENTORY WRAP -->





<script src="{{asset('js/inventory.js')}}"></script>
@endsection