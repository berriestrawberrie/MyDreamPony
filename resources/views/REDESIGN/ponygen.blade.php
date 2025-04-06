@extends('REDESIGN/redesign')
@section('title')Pony Generator @endsection


@section('bodysection')

<img id="image" src="http://localhost:8000/storage/users/0merged.png?" style="position: fixed; top: 50px; left: 10px;" width="300">
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


<div class="generator">  
      <div class="forminputs">
        <form method="POST" action="{{route('reponygencode')}}">
            @csrf
            @method('Post')
            <fieldset class="sex">
                <div class="selection-icon">
                    <input type="radio" name="sex" id="female" value="female" checked>
                    <label for="female"><img src="{{asset('storage/images/femaledesign.png')}}" title="Female"></label>
               </div>
               <div class="selection-icon">
                    <input type="radio" name="sex" id="male" value="male">
                    <label for="male"><img src="{{asset('storage/images/malesign.png')}}" title="Male"></label>
                </div>
            </fieldset>


            <div class="colorwrapper">
                <!--START OF FEMALE COLOR GENERATOR ICONS-->
                <div class="genfemale">
                    <div class="gencontainertop"><h3>Dam</h3><img src="{{asset('storage/images/shine.svg')}}"></div>
                
                    <fieldset class="traits">
                        <legend>Breed:</legend>
                        <div class="traitselect">
                            @foreach($buildponys as $breed)
                            
                                @if($breed["sex"] == "male")
                                <input type="radio" id="{{$breed["typeName"]}}f" name="typeName1" value="{{$breed["typeName"]}}">
                                <label for="{{$breed["typeName"]}}f">
                                <p>{{$breed["typeName"]}}</p>
                                <img src="/breedicon/{{$breed["typeName"]}}"></label>
                                @endif

                            @endforeach
                       
                        </div>
                    </fieldset>
                    <div class="gencontainertop selectall"><h3>Colors: </h3>
                        <label for="alldamcolors">Select all Dam colors: </label>
                        <select id="alldamcolors" onchange="damColors()">
                            <option value="none">--</option>
                            <option value="white">White</option>
                            <option value="gold">Gold</option>
                            <option value="darkgold">Dark Gold</option>
                            <option value="cyan">Cyan</option>
                            <option value="darkcyan">Dark Cyan</option>
                            <option value="purple">Purple</option>
                            <option value="darkpurple">Dark Purple</option>
                        </select>
                    </div>

                    <fieldset class="hexcolor">
                        <legend><i class="fa-solid fa-eye"></i>  Eyes:</legend>
                        <div class="hexselect">
                            <input type="radio" id="eyeCol1"  class="white" name="eyeCol" value="#FFFFFF">
                            <label for="eyeCol1"><img src="{{asset('storage/images/WHITEHEX.png')}}"></label>
                            <input type="radio" id="eyeCol2" name="eyeCol" value="#FFFF00">
                            <label for="eyeCol2"><img src="{{asset('storage/images/YELLOWHEX.png')}}"></label>
                            <input type="radio" id="eyeCol3" name="eyeCol" value="#BBBB00">
                            <label for="eyeCol3"><img src="{{asset('storage/images/GOLDHEX.png')}}"></label>
                            <input type="radio" id="eyeCol6" name="eyeCol" value="#00FFFF">
                            <label for="eyeCol6"><img src="{{asset('storage/images/CYANHEX.png')}}"></label>
                            <input type="radio" id="eyeCol7" name="eyeCol" value="#00BBBB">
                            <label for="eyeCol7"><img src="{{asset('storage/images/DARKCYANHEX.png')}}"></label>
                            <input type="radio" id="eyeCol4" name="eyeCol" value="#FF00FF">
                            <label for="eyeCol4"><img src="{{asset('storage/images/MAGENTAHEX.png')}}"></label>
                            <input type="radio" id="eyeCol5" name="eyeCol" value="#BB00BB">
                            <label for="eyeCol5"><img src="{{asset('storage/images/DARKMAGENTAHEX.png')}}"></label>

                        </div>
                    </fieldset>

                    <fieldset class="hexcolor">
                        <legend><i class="fa-solid fa-horse"></i>  Coat:</legend>
                        <div class="hexselect">
                            <input type="radio" id="baseCol1" name="baseCol" value="#FFFFFF">
                            <label for="baseCol1"><img src="{{asset('storage/images/WHITEHEX.png')}}"></label>
                            <input type="radio" id="baseCol2" name="baseCol" value="#FFFF00">
                            <label for="baseCol2"><img src="{{asset('storage/images/YELLOWHEX.png')}}"></label>
                            <input type="radio" id="baseCol3" name="baseCol" value="#BBBB00">
                            <label for="baseCol3"><img src="{{asset('storage/images/GOLDHEX.png')}}"></label>
                            <input type="radio" id="baseCol6" name="baseCol" value="#00FFFF">
                            <label for="baseCol6"><img src="{{asset('storage/images/CYANHEX.png')}}"></label>
                            <input type="radio" id="baseCol7" name="baseCol" value="#00BBBB">
                            <label for="baseCol7"><img src="{{asset('storage/images/DARKCYANHEX.png')}}"></label>
                            <input type="radio" id="baseCol4" name="baseCol" value="#FF00FF">
                            <label for="baseCol4"><img src="{{asset('storage/images/MAGENTAHEX.png')}}"></label>
                            <input type="radio" id="baseCol5" name="baseCol" value="#BB00BB">
                            <label for="baseCol5"><img src="{{asset('storage/images/DARKMAGENTAHEX.png')}}"></label>


                        </div>
                    </fieldset>

                    <fieldset class="hexcolor">
                        <legend><i class="fa-solid fa-scissors"></i>Hair (1):</legend>
                        <div class="hexselect">
                            <input type="radio" id="hairCol1" name="hairCol" value="#FFFFFF">
                            <label for="hairCol1"><img src="{{asset('storage/images/WHITEHEX.png')}}"></label>
                            <input type="radio" id="hairCol2" name="hairCol" value="#FFFF00">
                            <label for="hairCol2"><img src="{{asset('storage/images/YELLOWHEX.png')}}"></label>
                            <input type="radio" id="hairCol3" name="hairCol" value="#BBBB00">
                            <label for="hairCol3"><img src="{{asset('storage/images/GOLDHEX.png')}}"></label>
                            <input type="radio" id="hairCol6" name="hairCol" value="#00FFFF">
                            <label for="hairCol6"><img src="{{asset('storage/images/CYANHEX.png')}}"></label>
                            <input type="radio" id="hairCol7" name="hairCol" value="#00BBBB">
                            <label for="hairCol7"><img src="{{asset('storage/images/DARKCYANHEX.png')}}"></label>
                            <input type="radio" id="hairCol4" name="hairCol" value="#FF00FF">
                            <label for="hairCol4"><img src="{{asset('storage/images/MAGENTAHEX.png')}}"></label>
                            <input type="radio" id="hairCol5" name="hairCol" value="#BB00BB">
                            <label for="hairCol5"><img src="{{asset('storage/images/DARKMAGENTAHEX.png')}}"></label>

                        </div>
                    </fieldset>

                    <fieldset class="hexcolor">
                        <legend><i class="fa-solid fa-scissors"></i>Hair (2):</legend>
                        <div class="hexselect">
                            <input type="radio" id="hairCol211" name="hairCol21" value="#FFFFFF">
                            <label for="hairCol211"><img src="{{asset('storage/images/WHITEHEX.png')}}"></label>
                            <input type="radio" id="hairCol212" name="hairCol21" value="#FFFF00">
                            <label for="hairCol212"><img src="{{asset('storage/images/YELLOWHEX.png')}}"></label>
                            <input type="radio" id="hairCol213" name="hairCol21" value="#BBBB00">
                            <label for="hairCol213"><img src="{{asset('storage/images/GOLDHEX.png')}}"></label>
                            <input type="radio" id="hairCol216" name="hairCol21" value="#00FFFF">
                            <label for="hairCol216"><img src="{{asset('storage/images/CYANHEX.png')}}"></label>
                            <input type="radio" id="hairCol217" name="hairCol21" value="#00BBBB">
                            <label for="hairCol217"><img src="{{asset('storage/images/DARKCYANHEX.png')}}"></label>
                            <input type="radio" id="hairCol214" name="hairCol21" value="#FF00FF">
                            <label for="hairCol214"><img src="{{asset('storage/images/MAGENTAHEX.png')}}"></label>
                            <input type="radio" id="hairCol215" name="hairCol21" value="#BB00BB">
                            <label for="hairCol215"><img src="{{asset('storage/images/DARKMAGENTAHEX.png')}}"></label>

                        </div>
                    </fieldset>

                    <fieldset class="hexcolor">
                        <legend><i class="fa-solid fa-brush"></i>Accent (1):</legend>
                        <div class="hexselect">
                            <input type="radio" id="accentCol1" name="accentCol" value="#FFFFFF">
                            <label for="accentCol1"><img src="{{asset('storage/images/WHITEHEX.png')}}"></label>
                            <input type="radio" id="accentCol2" name="accentCol" value="#FFFF00">
                            <label for="accentCol2"><img src="{{asset('storage/images/YELLOWHEX.png')}}"></label>
                            <input type="radio" id="accentCol3" name="accentCol" value="#BBBB00">
                            <label for="accentCol3"><img src="{{asset('storage/images/GOLDHEX.png')}}"></label>
                            <input type="radio" id="accentCol6" name="accentCol" value="#00FFFF">
                            <label for="accentCol6"><img src="{{asset('storage/images/CYANHEX.png')}}"></label>
                            <input type="radio" id="accentCol7" name="accentCol" value="#00BBBB">
                            <label for="accentCol7"><img src="{{asset('storage/images/DARKCYANHEX.png')}}"></label>
                            <input type="radio" id="accentCol4" name="accentCol" value="#FF00FF">
                            <label for="accentCol4"><img src="{{asset('storage/images/MAGENTAHEX.png')}}"></label>
                            <input type="radio" id="accentCol5" name="accentCol" value="#BB00BB">
                            <label for="accentCol5"><img src="{{asset('storage/images/DARKMAGENTAHEX.png')}}"></label>

                        </div>
                    </fieldset>

                    <fieldset class="hexcolor">
                        <legend><i class="fa-solid fa-brush"></i>Accent (2):</legend>
                        <div class="hexselect">
                            <input type="radio" id="accentCol211" name="accentCol21" value="#FFFFFF">
                            <label for="accentCol211"><img src="{{asset('storage/images/WHITEHEX.png')}}"></label>
                            <input type="radio" id="accentCol212" name="accentCol21" value="#FFFF00">
                            <label for="accentCol212"><img src="{{asset('storage/images/YELLOWHEX.png')}}"></label>
                            <input type="radio" id="accentCol213" name="accentCol21" value="#BBBB00">
                            <label for="accentCol213"><img src="{{asset('storage/images/GOLDHEX.png')}}"></label>
                            <input type="radio" id="accentCol216" name="accentCol21" value="#00FFFF">
                            <label for="accentCol216"><img src="{{asset('storage/images/CYANHEX.png')}}"></label>
                            <input type="radio" id="accentCol217" name="accentCol21" value="#00BBBB">
                            <label for="accentCol217"><img src="{{asset('storage/images/DARKCYANHEX.png')}}"></label>
                            <input type="radio" id="accentCol214" name="accentCol21" value="#FF00FF">
                            <label for="accentCol214"><img src="{{asset('storage/images/MAGENTAHEX.png')}}"></label>
                            <input type="radio" id="accentCol215" name="accentCol21" value="#BB00BB">
                            <label for="accentCol215"><img src="{{asset('storage/images/DARKMAGENTAHEX.png')}}"></label>

                        </div>
                    </fieldset>

                    <fieldset class="traits">
                        <legend>Hair Trait:</legend>
                        <div class="traitselect">
                            @foreach($traits as $trait)
                                @if($trait["traittype"]=="hair")
                                    <input type="radio" id="{{$trait["traitname"]}}" name="specialtrait1" value="{{$trait["traitname"]}}">
                                    <label for="{{$trait["traitname"]}}">
                                    <p>{{$trait["traitname"]}}</p>
                                    <img src="/trait/genform/{{$trait["traitid"]}}"></label>
                                @endif
                            @endforeach
                            
                        </div>
                    </fieldset>

                    <fieldset class="traits">
                        <legend>Face Trait:</legend>
                        <div class="traitselect">
                            @foreach($traits as $trait)
                            @if($trait["traittype"]=="face")
                                <input type="radio" id="{{$trait["traitname"]}}" name="specialtrait1" value="{{$trait["traitname"]}}">
                                <label for="{{$trait["traitname"]}}">
                                <p>{{$trait["traitname"]}}</p>
                                <img src="/trait/genform/{{$trait["traitid"]}}"></label>
                            @endif
                        @endforeach
                        </div>
                    </fieldset>

                    <fieldset class="traits">
                        <legend>Body Trait:</legend>
                        <div class="traitselect">
                            @foreach($traits as $trait)
                            @if($trait["traittype"]=="body")
                                <input type="radio" id="{{$trait["traitname"]}}" name="specialtrait1" value="{{$trait["traitname"]}}">
                                <label for="{{$trait["traitname"]}}">
                                <p>{{$trait["traitname"]}}</p>
                                <img src="/trait/genform/{{$trait["traitid"]}}"></label>
                            @endif
                        @endforeach
                       
                        </div>
                    </fieldset>


                </div><!--END OF FEMALE FIELDSET-->

                 <!--START OF MALE COLOR GENERATOR ICONS-->
                 <div class="genmale">
                    <div class="gencontainertop"><h3>Sire</h3><img src="{{asset('storage/images/shine.svg')}}"></div>

                    <fieldset class="traits">
                        <legend>Breed:</legend>
                        <div class="traitselect">
                            @foreach($buildponys as $breed)
                            
                                @if($breed["sex"] == "male")
                                <input type="radio" id="{{$breed["typeName"]}}m" name="typeName2" value="{{$breed["typeName"]}}">
                                <label for="{{$breed["typeName"]}}m">
                                <p>{{$breed["typeName"]}}</p>
                                <img src="/breedicon/{{$breed["typeName"]}}"></label>
                                @endif

                            @endforeach
                       
                        </div>
                    </fieldset>

                    <div class="gencontainertop selectall"><h3>Colors:</h3>
                        <label for="allsirecolors">Select all Sire colors: </label>
                        <select id="allsirecolors" onchange="sireColors()">
                            <option value="none">--</option>
                            <option value="black">Black</option>
                            <option value="red">Red</option>
                            <option value="darkred">Dark REd</option>
                            <option value="green">Green</option>
                            <option value="darkgreen">Dark Green</option>
                            <option value="blue">Blue</option>
                            <option value="darkblue">Dark Blue</option>
                        </select>
                    </div>

                    <fieldset class="hexcolor">
                        <legend><i class="fa-solid fa-eye"></i>  Eyes:</legend>
                        <div class="hexselect">
                            <input type="radio" id="eyeCol21" name="eyeCol2" value="#000000">
                            <label for="eyeCol21"><img src="{{asset('storage/images/BLACKHEX.png')}}"></label>
                            <input type="radio" id="eyeCol22" name="eyeCol2" value="#FF0000">
                            <label for="eyeCol22"><img src="{{asset('storage/images/REDHEX.png')}}"></label>
                            <input type="radio" id="eyeCol23" name="eyeCol2" value="#BB0000">
                            <label for="eyeCol23"><img src="{{asset('storage/images/DARKRED.png')}}"></label>
                            <input type="radio" id="eyeCol26" name="eyeCol2" value="#00FF00">
                            <label for="eyeCol26"><img src="{{asset('storage/images/GREENHEX.png')}}"></label>
                            <input type="radio" id="eyeCol27" name="eyeCol2" value="#00BB00">
                            <label for="eyeCol27"><img src="{{asset('storage/images/DARKGREEN.png')}}"></label>
                            <input type="radio" id="eyeCol24" name="eyeCol2" value="#0000FF">
                            <label for="eyeCol24"><img src="{{asset('storage/images/BLUEHEX.png')}}"></label>
                            <input type="radio" id="eyeCol25" name="eyeCol2" value="#0000BB">
                            <label for="eyeCol25"><img src="{{asset('storage/images/DARKBLUE.png')}}"></label>

                        </div>
                    </fieldset>

                    <fieldset class="hexcolor">
                        <legend><i class="fa-solid fa-horse"></i>  Coat:</legend>
                        <div class="hexselect">
                            <input type="radio" id="baseCol21" name="baseCol2" value="#000000">
                            <label for="baseCol21"><img src="{{asset('storage/images/BLACKHEX.png')}}"></label>
                            <input type="radio" id="baseCol22" name="baseCol2" value="#FF0000">
                            <label for="baseCol22"><img src="{{asset('storage/images/REDHEX.png')}}"></label>
                            <input type="radio" id="baseCol23" name="baseCol2" value="#BB0000">
                            <label for="baseCol23"><img src="{{asset('storage/images/DARKRED.png')}}"></label>
                            <input type="radio" id="baseCol26" name="baseCol2" value="#00FF00">
                            <label for="baseCol26"><img src="{{asset('storage/images/GREENHEX.png')}}"></label>
                            <input type="radio" id="baseCol27" name="baseCol2" value="#00BB00">
                            <label for="baseCol27"><img src="{{asset('storage/images/DARKGREEN.png')}}"></label>
                            <input type="radio" id="baseCol24" name="baseCol2" value="#0000FF">
                            <label for="baseCol24"><img src="{{asset('storage/images/BLUEHEX.png')}}"></label>
                            <input type="radio" id="baseCol25" name="baseCol2" value="#0000BB">
                            <label for="baseCol25"><img src="{{asset('storage/images/DARKBLUE.png')}}"></label>


                        </div>
                    </fieldset>

                    <fieldset class="hexcolor">
                        <legend><i class="fa-solid fa-scissors"></i>Hair (1):</legend>
                        <div class="hexselect">
                            <input type="radio" id="hairCol21" name="hairCol2" value="#000000">
                            <label for="hairCol21"><img src="{{asset('storage/images/BLACKHEX.png')}}"></label>
                            <input type="radio" id="hairCol22" name="hairCol2" value="#FF0000">
                            <label for="hairCol22"><img src="{{asset('storage/images/REDHEX.png')}}"></label>
                            <input type="radio" id="hairCol23" name="hairCol2" value="#BB0000">
                            <label for="hairCol23"><img src="{{asset('storage/images/DARKRED.png')}}"></label>
                            <input type="radio" id="hairCol26" name="hairCol2" value="#00FF00">
                            <label for="hairCol26"><img src="{{asset('storage/images/GREENHEX.png')}}"></label>
                            <input type="radio" id="hairCol27" name="hairCol2" value="#00BB00">
                            <label for="hairCol27"><img src="{{asset('storage/images/DARKGREEN.png')}}"></label>
                            <input type="radio" id="hairCol24" name="hairCol2" value="#0000FF">
                            <label for="hairCol24"><img src="{{asset('storage/images/BLUEHEX.png')}}"></label>
                            <input type="radio" id="hairCol25" name="hairCol2" value="#0000BB">
                            <label for="hairCol25"><img src="{{asset('storage/images/DARKBLUE.png')}}"></label>

                        </div>
                    </fieldset>

                    <fieldset class="hexcolor">
                        <legend><i class="fa-solid fa-scissors"></i>Hair (2):</legend>
                        <div class="hexselect">
                            <input type="radio" id="hairCol221" name="hairCol22" value="#000000">
                            <label for="hairCol221"><img src="{{asset('storage/images/BLACKHEX.png')}}"></label>
                            <input type="radio" id="hairCol222" name="hairCol22" value="#FF0000">
                            <label for="hairCol222"><img src="{{asset('storage/images/REDHEX.png')}}"></label>
                            <input type="radio" id="hairCol223" name="hairCol22" value="#BB0000">
                            <label for="hairCol223"><img src="{{asset('storage/images/DARKRED.png')}}"></label>
                            <input type="radio" id="hairCol226" name="hairCol22" value="#00FF00">
                            <label for="hairCol226"><img src="{{asset('storage/images/GREENHEX.png')}}"></label>
                            <input type="radio" id="hairCol227" name="hairCol22" value="#00BB00">
                            <label for="hairCol227"><img src="{{asset('storage/images/DARKGREEN.png')}}"></label>
                            <input type="radio" id="hairCol224" name="hairCol22" value="#0000FF">
                            <label for="hairCol224"><img src="{{asset('storage/images/BLUEHEX.png')}}"></label>
                            <input type="radio" id="hairCol225" name="hairCol22" value="#0000BB">
                            <label for="hairCol225"><img src="{{asset('storage/images/DARKBLUE.png')}}"></label>

                        </div>
                    </fieldset>

                    <fieldset class="hexcolor">
                        <legend><i class="fa-solid fa-brush"></i>Accent (1):</legend>
                        <div class="hexselect">
                            <input type="radio" id="accentCol21" name="accentCol2" value="#000000">
                            <label for="accentCol21"><img src="{{asset('storage/images/BLACKHEX.png')}}"></label>
                            <input type="radio" id="accentCol22" name="accentCol2" value="#FF0000">
                            <label for="accentCol22"><img src="{{asset('storage/images/REDHEX.png')}}"></label>
                            <input type="radio" id="accentCol23" name="accentCol2" value="#BB0000">
                            <label for="accentCol23"><img src="{{asset('storage/images/DARKRED.png')}}"></label>
                            <input type="radio" id="accentCol26" name="accentCol2" value="#00FF00">
                            <label for="accentCol26"><img src="{{asset('storage/images/GREENHEX.png')}}"></label>
                            <input type="radio" id="accentCol27" name="accentCol2" value="#00BB00">
                            <label for="accentCol27"><img src="{{asset('storage/images/DARKGREEN.png')}}"></label>
                            <input type="radio" id="accentCol24" name="accentCol2" value="#0000FF">
                            <label for="accentCol24"><img src="{{asset('storage/images/BLUEHEX.png')}}"></label>
                            <input type="radio" id="accentCol25" name="accentCol2" value="#0000BB">
                            <label for="accentCol25"><img src="{{asset('storage/images/DARKBLUE.png')}}"></label>

                        </div>
                    </fieldset>

                    <fieldset class="hexcolor">
                        <legend><i class="fa-solid fa-brush"></i>Accent (2):</legend>
                        <div class="hexselect">
                            <input type="radio" id="accentCol221" name="accentCol22" value="#000000">
                            <label for="accentCol221"><img src="{{asset('storage/images/BLACKHEX.png')}}"></label>
                            <input type="radio" id="accentCol222" name="accentCol22" value="#FF0000">
                            <label for="accentCol222"><img src="{{asset('storage/images/REDHEX.png')}}"></label>
                            <input type="radio" id="accentCol223" name="accentCol22" value="#BB0000">
                            <label for="accentCol223"><img src="{{asset('storage/images/DARKRED.png')}}"></label>
                            <input type="radio" id="accentCol226" name="accentCol22" value="#00FF00">
                            <label for="accentCol226"><img src="{{asset('storage/images/GREENHEX.png')}}"></label>
                            <input type="radio" id="accentCol227" name="accentCol22" value="#00BB00">
                            <label for="accentCol227"><img src="{{asset('storage/images/DARKGREEN.png')}}"></label>
                            <input type="radio" id="accentCol224" name="accentCol22" value="#0000FF">
                            <label for="accentCol224"><img src="{{asset('storage/images/BLUEHEX.png')}}"></label>
                            <input type="radio" id="accentCol225" name="accentCol22" value="#0000BB">
                            <label for="accentCol225"><img src="{{asset('storage/images/DARKBLUE.png')}}"></label>

                        </div>
                    </fieldset>

                    <fieldset class="traits">
                        <legend>Hair Trait:</legend>
                        <div class="traitselect">
                            @foreach($traits as $trait)
                            @if($trait["traittype"]=="hair")
                                <input type="radio" id="{{$trait["traitname"]}}2" name="specialtrait2" value="{{$trait["traitname"]}}">
                                <label for="{{$trait["traitname"]}}2">
                                <p>{{$trait["traitname"]}}</p>
                                <img src="/trait/genform/{{$trait["traitid"]}}"></label>
                            @endif
                        @endforeach
                            
                        </div>
                    </fieldset>

                    <fieldset class="traits">
                        <legend>Face Trait:</legend>
                        <div class="traitselect">
                            @foreach($traits as $trait)
                            @if($trait["traittype"]=="face")
                                <input type="radio" id="{{$trait["traitname"]}}2" name="specialtrait2" value="{{$trait["traitname"]}}">
                                <label for="{{$trait["traitname"]}}2">
                                <p>{{$trait["traitname"]}}</p>
                                <img src="/trait/genform/{{$trait["traitid"]}}"></label>
                            @endif
                        @endforeach
                        </div>
                    </fieldset>

                    <fieldset class="traits">
                        <legend>Body Trait:</legend>
                        <div class="traitselect">
                            @foreach($traits as $trait)
                            @if($trait["traittype"]=="body")
                                <input type="radio" id="{{$trait["traitname"]}}2" name="specialtrait2" value="{{$trait["traitname"]}}">
                                <label for="{{$trait["traitname"]}}2">
                                <p>{{$trait["traitname"]}}</p>
                                <img src="/trait/genform/{{$trait["traitid"]}}"></label>
                            @endif
                        @endforeach
                        </div>
                    </fieldset>

                </div><!--END OF male FIELDSET-->
               
            </div><!--END OF COLORWRAPPER-->
            <input  class="btn-gold" id="submit" type="submit">
        </form>



        <div class="space" style="height: 500px;">
        </div>
    </div><!--END OF FORM INPUTS-->

    <script type="text/javascript" src="{{ asset('js/reponygen.js') }}">
    </script>
@endsection