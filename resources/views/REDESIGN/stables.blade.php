@extends('REDESIGN/redesign')
@section('title')My Stable Name @endsection


@section('bodysection')
    <div class="stable ">
                
        <div class="topstable flex flex-col items-center sm:flex-row ">
            <div class="relative floating">
                <img class="island" src="{{asset('storage/images/island1.png')}}">
                <img class="house absolute scale-60 -top-5 left-0  sm:scale-100 sm:top-18 sm:left-32" src="{{asset('storage/images/house.png')}}">
            </div>
            <div class="relative flex items-center flex-col mb-4 sm:flex-row ">
                <img class="stableboard" src="{{asset('storage/images/stableboard.png')}}">
                <div class="absolute top-10 left-10 w-[300px] h-[120px]  sm:top-15 sm:left-20">
                    <h2>{{$user->stable1}}</h2>

                </div>
                <a href="{{route('restable2')}}"><img class="absolute hover:brightness-130 -top-20 right-0 scale-70 sm:relative sm:top-0 sm:scale-100" src="{{asset('storage/images/arrow.png')}}"></a>
            </div>
        </div>


        <div class="ponystable h-screen bg-white p-2 sm:p-6 sm:rounded-3xl">
            <ul class="sortable list-none flex flex-wrap justify-evenly gap-2">
                @foreach($ponys as $pony)
                <li class="ui-state-default blank" data-index="{{$pony->ponyid}}" data-position="{{$pony->stable}}">
                    <div class="card flex flex-col ">
                        <div class="cardborder">
                            <div class="card__status relative flex  justify-center h-[30px]">
                                @if($pony->health < 100)<img class="statusicon absolute -top-2 left-4 sm:-top-5 sm:left-7  w-[15px] sm:w-[30px]" src="{{asset('storage/images/statu-heart.svg')}}">@endif
                                <img class="statusicon absolute -top-2 left-0  sm:-top-5 sm:left-0 w-[15px] sm:w-[30px]" src="{{asset('storage/images/statu-light.svg')}}">
                                @if($pony->nxt_contest)<img class="statusicon  absolute -top-2 right-0 sm:-top-5 sm:right-0 w-[15px] sm:w-[30px]" src="{{asset('storage/images/status-shield.svg')}}">@endif
                                <a href="/re-ponyprofile/{{$pony->ponyid}}"><h4 >{{$pony->name}}</h4></a>
                            </div>
                            <div class="card__pony">
                                <img class="w-[150px] sm:w-[300px]" src="/ponyImage/{{$pony->ponyid}}" draggable="false"/>
                            </div>
                            <div class="card__name">

                            </div>
                            <div class="card__substatus">
                                @if($pony->pregnant == 1)<img class="statusicon w-[15px] sm:w-[30px]" src="{{asset('storage/images/status-preggy.svg')}}">@endif
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