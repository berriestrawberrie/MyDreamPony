@extends('REDESIGN/redesign')
@section('title'){{$user->stable2}} @endsection
@section('pagecss')<link rel="stylesheet" href="{{asset('css/stables2.css')}}">  @endsection


@section('bodysection')
    <div class="stable">
                
        <div class="topstable">
            <div class="topstable__stablehouse floating">
                <img class="island" src="{{asset('storage/images/island1.png')}}">
                <img class="house" src="{{asset('storage/images/house.png')}}">
            </div>
            <div class="topstable__stableboard">
                <img class="stableboard" src="{{asset('storage/images/stableboard.png')}}">
                <div class="boardinfo">
                    <h2>{{$user->stable2}}</h2>

                </div>
                <a href="{{route('restable')}}"><img class="topstable__next" src="{{asset('storage/images/arrow.png')}}"></a>
            </div>
        </div>


        <div class="ponystable">
            <ul class="sortable">
                @foreach($ponys as $pony)
                <li class="ui-state-default blank" data-index="{{$pony->ponyid}}" data-position="{{$pony->stable}}">
                    <div class="card">
                        <div class="cardborder">
                            <div class="card__status">
                                @if($pony->health < 100)<img class="statusicon" src="{{asset('storage/images/statu-heart.svg')}}">@endif
                                <img class="statusicon" src="{{asset('storage/images/statu-light.svg')}}">
                                @if($pony->nxt_contest)<img class="statusicon" src="{{asset('storage/images/status-shield.svg')}}">@endif
                                <h4>{{$pony->name}}</h4>
                            </div>
                            <div class="card__pony">
                                <img src="/ponyImage/{{$pony->ponyid}}" draggable="false"/>
                            </div>
                            <div class="card__name">

                            </div>
                            <div class="card__substatus">
                                @if($pony->pregnant == 1)<img class="statusicon" src="{{asset('storage/images/status-preggy.svg')}}">@endif
                            </div>
                        </div>
                    </div><!--END OF CARD-->
                </li>
                @endforeach
            </ul>
    </div><!--END OF STABLES-->

    <script type="text/javascript" src="{{ asset('js/stables.js') }}">
    </script>
@endsection