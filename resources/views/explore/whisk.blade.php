@extends('config3')
@section('title')Equip Items @endsection

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

@endsection

@section('content')
{{$user}}
@endsection


@section('config3')
<h2>Whisker's & Whisk </h2>
<div id="shopnpc">
    <img src="{{asset('storage/kitt-folkani.gif')}}" width="500"  margin-left: 20px;">
    <div id="shopowner" class="bubble bubble-bottom-left">This is what the shopowner will say</div>
    <div id="shopevent"> Something Here
        <a href="/restock/{{$npc}}"><button class="button-8">Restock Shop</button></a>
        <a href="/unstock/{{$npc}}"><button class="button-8">Set Stock to 0</button></a>
    </div>
</div>

<div style="display: flex; flex-wrap: wrap; width: 100%;">
    @for($i =0; $i< count($items); $i++)
        @if($items[$i]["stock"] > 0)
        <div id="inventorywrap">
            <div class="invetorydiv" style="width: 165px;">
            {{$items[$i]["itemname"]}}
                <div style="background-color: #77C6FF75; border-style:double;
                border-color: #314D61; border-radius: 20px; height: 160px; width: 160px; margin-left: auto; margin-right: auto;">
                    <div style="margin: 10px; position: absolute; background-color: #fff; border-radius: 5px; height: 20px; text-align: center; padding: 2px;">
           
                        {{$items[$i]["stock"]}}
                    </div>
            
                    <img src="/item/{{$items[$i]["itemid"]}}/icon" width="150">
                </div>
                <span style="color: black; font-weight: bold;text-transform:capitalize;">{{$items[$i]["rarity"]}}</span><br>
                <img src="{{asset('storage/coin.png')}}" width="30px">{{$items[$i]["price"]}} <br>
            
                    <a href="/purchase/{{$items[$i]["npc"]}}/{{$items[$i]["itemid"]}}"><button class="button-8">Purchase </button></a>
            </div><!-- END OF INVENTORY DIV -->
            <div class="hide">  
                <b>Description:</b>{{$items[$i]["info"]}}<br>
                @foreach($tags[$i] as $tag)
                <div>{{$tag}}</div>   
                @endforeach
            </div>
        </div>

        @endif
        


    @endfor
</div><!--END OF INVENTORY WRAPPING DISPLAY -->


@endsection