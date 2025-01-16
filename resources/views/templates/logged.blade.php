@extends('config3')
@section('title')My Dream Pony @endsection


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
<h2>{{$user->name}}'s Farm</h2>

<div style="padding: 10px;">
More to come :D
</div>

@endsection