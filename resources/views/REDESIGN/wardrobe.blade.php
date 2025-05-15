@extends('REDESIGN/redesign')
@section('title')Player Wardrobe @endsection
@section('pagecss') 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
@endsection

@section('bodysection')

<div class="wrapper">

    <div class="wrapper__avatar">
        <div class="se-pre-con"></div>
        <img id="base" src="/buildavatarcolors/9/base/A86344" >
        <img id="extra" src="/buildavatarcolors/9/extra/0000FF">
        <img id="mask" src="/buildavatar/9/mask">
        <img id="shade" src="/buildavatar/9/shade">
        <img id="white"src="/buildavatar/9/white">
        <img id="ink" src="/buildavatar/9/ink">
        <div class="race">
            <form method="POST" action="">
                @csrf
                @method('Post')
                <select class="raceselect" id="selectrace" name="avatarid" onchange="changeBase()">
                    <option value="1">Feminine Human</option>
                    <option value="2">Masculine Human</option>
                    <option value="3">Feminine Fauna</option>
                    <option value="4">Masculine Fauna</option>
                    <option value="5">Feminine Flora</option>
                    <option value="6">Masculine Flora</option>
                    <option value="7">Feminine  Direborn</option>
                    <option value="8">Masculine Direborn</option>
                    <option value="9">Feminine  Felkin</option>
                    <option value="10">Masculine Felkin</option>
                </select>

                <input type="color" name="basehue" id="basehue" value="#A86344">
                <input type="color" name="extrahue" id="extrahue value="#0000FF">
            </form>
        </div>
    </div>
    <!--END OF WRAPPER-->
    <div class="wrapper__location">
        <div class="location__base opt"><i class="fa-solid fa-person"></i></div>
        <div class="location__eyes opt"><i class="fa-solid fa-eye"></i></div>
        <div class="location__mouth opt"><i class="fa-solid fa-face-grin-wide"></i></div>
        <div class="location__hair opt"><i class="fa-solid fa-scissors"></i></div>
        <div class="location__clothes opt"><i class="fa-solid fa-shirt"></i></div>
        <div class="location__extra opt"><i class="fa-solid fa-web-awesome"></i></div>
     
    </div>
    <div class="wrapper__wearables">

    </div>

</div>
<div class="spacer" style="height: 200px;"></div>

<script type="text/javascript" src="{{ asset('js/wardrobe.js') }}">
    </script>
@endsection