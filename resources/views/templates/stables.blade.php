@extends('config3')
@section('title')Stable 1 @endsection
@section('header')

@endsection


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



@section('config3')
<h2>Stable Name</h2>


    <ul class="sortable">
    @foreach ($ponys as $pony)
        <li class="ui-state-default blank" data-index="{{$pony->ponyid}}" data-position="{{$pony->stable}}">
            <div class="stables">
                <div id="breedstatus">
                    @if($pony->pregnant == 1)<img src="{{asset('storage/preggy.png')}}" >@endif
                    @if($pony->price)<img src="{{asset('storage/coiny.png')}}">@endif
                </div>
                <h3>{{$pony->name}}</h3>
                <a href="/pony/{{$pony->ponyid}}"><img src="/ponyImage/{{$pony->ponyid}}" draggable="false"/></a> 
                <div id="stablestatus">
                    @if($pony->hunger < 100)<img src="{{asset('storage/foody.png')}}" >@endif
                    @if($pony->health < 100)<img src="{{asset('storage/healthy.png')}}">@endif
                    </div>
            </div>
        </li>
      
    @endforeach
    </ul>

    <script type="text/javascript" src="{{ asset('js/stables.js') }}">
    </script>


@endsection