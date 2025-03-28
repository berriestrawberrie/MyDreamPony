@extends('REDESIGN/redesign')
@section('title')My Stable Name @endsection


@section('bodysection')
    <div class="stable">
                
        <div class="topstable">
            <div class="topstable__stablehouse floating">
                <img class="island" src="{{asset('storage/images/island1.png')}}">
                <img class="house" src="{{asset('storage/images/house.png')}}">
            </div>
            <div class="topstable__stableboard">
                <img class="stableboard" src="{{asset('storage/images/stableboard.png')}}">
                <p class="boardinfo">I'm temporary placeholder here mmk</p>
                <a href="#"><img class="topstable__next" src="{{asset('storage/images/arrow.png')}}"></a>
            </div>
        </div>
        <div class="ponystable">

            <a href="{{route('reponyprofile')}}"><div class="card">
                <div class="cardborder">
                    <div class="card__status">
                        <img class="statusicon" src="{{asset('storage/images/statu-heart.svg')}}">
                        <img class="statusicon" src="{{asset('storage/images/statu-light.svg')}}">
                        <img class="statusicon" src="{{asset('storage/images/status-shield.svg')}}">
                        <h4>Pony Name</h4>
                    </div>
                    <div class="card__pony">
                        <img src="{{asset('storage/images/kitt-male.png')}}">
                    </div>
                    <div class="card__name">

                    </div>
                    <div class="card__substatus">
                        <img class="statusicon" src="{{asset('storage/images/status-preggy.svg')}}">
                    </div>
                </div>
            </div></a><!--END OF CARD-->
            
    </div>
@endsection