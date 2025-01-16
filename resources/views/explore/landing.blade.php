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

@section('opendiv')
<div style="position: relative;" class="worldmap">
    <img src="{{asset('storage/worldmap2.png')}}" width="900">
    <div style="position: absolute; top: 180px; left: 240px;"><img class="floatingI" src="{{asset('storage/explorable2.png')}}" width="40"></div>
    <div style="position: absolute; top: 370px; left: 320px;"><img class="floatingI" src="{{asset('storage/explorable2.png')}}" width="40"></div>
</div>


@endsection

@section('config3')

<h2>Geldingmire Map </h2>
<a href="/shop/whisk"><button class="button-8"> Whiskers & Whisk </button></a>
<a href="/shop/claws"><button class="button-8"> Claws & Class</button></a>
<a href="/shop/farmer"><button class="button-8"> Scratch & Seed Market</button></a>

@endsection