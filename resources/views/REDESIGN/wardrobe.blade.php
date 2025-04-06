@extends('REDESIGN/redesign')
@section('title')Player Wardrobe @endsection


@section('bodysection')

<div class="wrapper">

    <div class="wrapper__avatar">
        <img src="http://localhost:8000/storage/users/1avibase.png?" >
        <img src="/buildavatar/1/mask">
        <img src="/buildavatar/1/shade">
        <img src="/buildavatar/1/white">
        <img src="/buildavatar/1/ink">
        <div class="race">
            <img class="race_banner" src="{{asset('/storage/images/button.png')}}" style="width: 150px;">
            <select class="raceselect">
                <option>Human</option>
                <option>Felkin</option>
                <option>Direborn</option>
                <option>Fauna</option>
                <option>Flora</option>
            </select>
        </div>
    </div>
    <div class="wrapper__location">
        <div class="location__base opt"><i class="fa-solid fa-person"></i></div>
        <div class="location__eyes opt"><i class="fa-solid fa-eye"></i></div>
        <div class="location__mouth opt"><i class="fa-solid fa-face-grin-wide"></i></div>
        <div class="location__hair opt"><i class="fa-solid fa-scissors"></i></div>
        <div class="location__clothes opt"><i class="fa-solid fa-shirt"></i></div>
        <div class="location__extra opt"><i class="fa-solid fa-web-awesome"></i></div>
        <form method="POST" action="{{route('basehue')}}">
            @csrf
            @method('Post')
            <input type="color" name="basehue" id="basehue">
            <select name="avatarid"><option>1</option></select>
            <input type="submit">
        </form>
    </div>
    <div class="wrapper__wearables">

    </div>

</div>
<div class="spacer" style="height: 200px;"></div>

@endsection