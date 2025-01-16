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
<a href="{{route('admin.index')}}" ><button class="button-8">Admin</button></a>
@endsection

@section('content')
{{$user}}
@endsection


@section('config3')
<h2>Equip Item</h2>
<div id="equipFormTop" style="display: flex; flex-wrap: wrap; padding: 10px;">
    <div class="invetorydiv" style="width: 240px; ">
        <span style="color: black; font-size: 24px;text-transform:capitalize;">{{$item[0]["itemname"]}}</span>
        <div style="background-color: #77C6FF75; border-style:double;
        border-color: #314D61; border-radius: 20px; height: 220px; width: 220px; margin-left: auto; margin-right: auto;">
    
            <img  src="/item/{{$item[0]["itemid"]}}/icon" width="200px" >
        </div>
        <span style="color: black; font-size: 20px; font-weight: bold;text-transform:capitalize;"> {{$item[0]["rarity"]}}</span>
    </div>
    <div style="padding-top: 130px; padding-left: 30px; font-size: 20px;">
        You are about to equip a pony with a <b>{{$item[0]["itemname"]}}</b>.
        <br><br>Choose the Pony you wish to equip below.
    </div>
</div>
<div id="equipFormBottom">
    <div>
        <select onchange="selectFilter()"  class="filter-type">
            <option>All</option>
            <option>Unicorn</option>
            <option>Dragon</option>
            <option>Avian</option>
            <option>Kittling</option>
        </select>
    </div>
    <form style="display:flex; flex-wrap: wrap; justify-content: space-evenly;" method="POST" action="/equip/{{$item[0]["itemid"]}}">

        @csrf
        @method('Post')
        <button type="submit" style="position: absolute;margin-top: -10px;">Equip Item</button>
        @foreach($ponys as $pony)
        <div class="selection-icon filter {{$pony->typeid}} All" style="margin-top: 20px;text-align: center;">
        <input type="radio" name="ponychoice" id="{{$pony->ponyid}}" value="{{$pony->ponyid}}" >
        <label for="{{$pony->ponyid}}">{{$pony->name}}<br> <img src="/ponyImage/{{$pony->ponyid}}" width="180"></label>
        </div>
        @endforeach
    </form>
</div>
<script src="{{asset('js/equipForm.js')}}"></script>
@endsection