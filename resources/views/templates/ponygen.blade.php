@extends('config3')
@section('title')Pony Generator @endsection
@section('alert')
    @if(session()->has('success'))
    <div class="alert">
        <div class="alertinner"> {{session('success')}}</div>
    </div>
    @endif

     @if($errors->any())
      <div class="alert alert-danger">
      {{session('error')}}
      @endif
@endsection
@section('config3')
<h2>Pony Gen</h2>
<form id="ponyform2" action="{{route('ponygencode')}}" method="POST">
   
    @csrf
    @method('Post')
    <fieldset style = "width: 50%; margin-left: auto;
    margin-right: auto; justify-content: space-between;">
             <!--FEMALE SEX OPTION -->
                <div class="selection-icon">
                     <input type="radio" name="sex" id="female" value="female" checked>
                     <label for="female"><img src="{{asset('storage/femaledesign.png')}}" style="width: 90px !important;" title="Female"></label>
                </div>
        <!--MALE SEX OPTION -->
            <div class="selection-icon">
            <input type="radio" name="sex" id="male" value="male">
            <label for="male"><img src="{{asset('storage/malesign.png')}}" style="width: 90px !important;" title="Male"></label>
            </div>
    </fieldset>

<div style="display: flex">

    <div id="maleinputs" style="display: flex; flex-wrap: wrap;">

        <fieldset >
            <legend>Eye Color</legend>
            <select id="eyeCol" name="eyeCol" onchange="changeEye(this);">
                <option style="background-color: #FFFFFF;">#FFFFFF</option>
                <option style="background-color: #FFFF00">#FFFF00</option>
                <option style="background-color: #AAAA00">#AAAA00</option>
                <option style="background-color: #00FFFF">#00FFFF</option>
                <option style="background-color: #00AAAA">#00AAAA</option>
                <option style="background-color: #AA00AA"">#AA00AA</option>
                <option style="background-color: #FF00FF">#FF00FF</option>
            </select>
            <div id="eyeColdiv">
            </div>
        </fieldset>
        <fieldset >
            <legend>Coat Color</legend>
            <select id="baseCol" name="baseCol" onchange="changeBase(this);">
                <option style="background-color: #FFFFFF;">#FFFFFF</option>
                <option style="background-color: #FFFF00">#FFFF00</option>
                <option style="background-color: #AAAA00">#AAAA00</option>
                <option style="background-color: #00FFFF">#00FFFF</option>
                <option style="background-color: #00AAAA">#00AAAA</option>
                <option style="background-color: #AA00AA"">#AA00AA</option>
                <option style="background-color: #FF00FF">#FF00FF</option>
            </select>
            <div id="baseColdiv">
            </div>
        </fieldset>
        <fieldset >
            <legend>Hair Color</legend>
            <select id="hairCol" name="hairCol" onchange="changeHair(this);">
                <option style="background-color: #FFFFFF;">#FFFFFF</option>
                <option style="background-color: #FFFF00">#FFFF00</option>
                <option style="background-color: #AAAA00">#AAAA00</option>
                <option style="background-color: #00FFFF">#00FFFF</option>
                <option style="background-color: #00AAAA">#00AAAA</option>
                <option style="background-color: #AA00AA"">#AA00AA</option>
                <option style="background-color: #FF00FF">#FF00FF</option>
            </select>
            <div id="hairColdiv">
            </div>
        </fieldset>

        <fieldset >
            <legend>Hair Color (II)</legend>
            <select id="hairCol21" name="hairCol21" onchange="changeHair21(this);">
                <option style="background-color: #FFFFFF;">#FFFFFF</option>
                <option style="background-color: #FFFF00">#FFFF00</option>
                <option style="background-color: #AAAA00">#AAAA00</option>
                <option style="background-color: #00FFFF">#00FFFF</option>
                <option style="background-color: #00AAAA">#00AAAA</option>
                <option style="background-color: #AA00AA"">#AA00AA</option>
                <option style="background-color: #FF00FF">#FF00FF</option>
            </select>
            <div id="hairCol21div">
            </div>
        </fieldset>

        <fieldset >
            <legend>Accent Color</legend>
            <select id="accentCol" name="accentCol" onchange="changeAccent(this);">
                <option style="background-color: #FFFFFF;">#FFFFFF</option>
                <option style="background-color: #FFFF00">#FFFF00</option>
                <option style="background-color: #AAAA00">#AAAA00</option>
                <option style="background-color: #00FFFF">#00FFFF</option>
                <option style="background-color: #00AAAA">#00AAAA</option>
                <option style="background-color: #AA00AA"">#AA00AA</option>
                <option style="background-color: #FF00FF">#FF00FF</option>
            </select>
            <div id="accentColdiv">
            </div>
        </fieldset>

        <fieldset >
            <legend>Accent Color (II)</legend>
            <select id="accentCol21" name="accentCol21" onchange="changeAccent21(this);">
                <option style="background-color: #FFFFFF;">#FFFFFF</option>
                <option style="background-color: #FFFF00">#FFFF00</option>
                <option style="background-color: #AAAA00">#AAAA00</option>
                <option style="background-color: #00FFFF">#00FFFF</option>
                <option style="background-color: #00AAAA">#00AAAA</option>
                <option style="background-color: #AA00AA"">#AA00AA</option>
                <option style="background-color: #FF00FF">#FF00FF</option>
            </select>
            <div id="accentCol21div">
            </div>
        </fieldset>
        <!-- END OF COLORS -->
            <fieldset>
                <legend>Pony Breed</legend>
                <!-- UNICORN OPTION -->
                <div class="selection-icon">
                        <input type="radio" name="typeName1" id="Unicorn" value="Unicorn" checked>
                        <label for="Unicorn">  <img src="{{asset('storage/UNI-ICON.png')}}" title="Unicorn" ></label>
                    </div>
                    <!-- DRAGON OPTION -->
                <div class="selection-icon">
                    <input type="radio" name="typeName1" id="Dragon" value="Dragon" >
                    <label for="Dragon">  <img src="{{asset('storage/DRAGON-ICON.png')}}"  title="Dragon"></label>
                    </div>
                    <!-- AVIAN OPTION -->
                <div class="selection-icon">
                    <input type="radio" name="typeName1" id="Avian" value="Avian" >
                    <label for="Avian">  <img src="{{asset('storage/AVIAN-ICON.png')}}" title="Avian" ></label>
                    </div>
                    <!-- KITTLING OPTION -->
                <div class="selection-icon">
                    <input type="radio" name="typeName1" id="Kittling" value="Kittling" >
                    <label for="Kittling">  <img src="{{asset('storage/KITT-ICON.png')}}" title="Kittling" ></label>
                    </div>
            </fieldset>

            <fieldset >
                <legend>Hair Traits</legend>
                    <!-- HAIR NONE OPTION -->
                    <div class="selection-icon">
                        <input type="radio" name="hairtrait" id="hnone" value="none" checked>
                        <label for="hnone"><img src="{{asset('storage/none-icon.png')}}"   title="none"></label>
                </div>

                    <!-- HAIR OPTIONS -->
                    @foreach( $traits as $trait)
                    @if($trait["traittype"]== "hair")
                    <div class="selection-icon">
                        <input type="radio" name="hairtrait" id="{{$trait["traitname"]}}" value="{{$trait["traitname"]}}" >
                        <label for="{{$trait["traitname"]}}"><img src="/trait/genform/{{$trait["traitid"]}}"   title="{{$trait["traitname"]}}"></label>
                    </div>
                    @endif
                    @endforeach
                    
            </fieldset>

            <fieldset >
                <legend>Face Traits</legend>
                <!-- FACE NONE OPTION -->
                <div class="selection-icon">
                <input type="radio" name="facetrait" id="fnone" value="none" checked>
                <label for="fnone"><img src="{{asset('storage/none-icon.png')}}"   title="none"></label>
                </div>

                <!-- FACE OPTIONS -->
                @foreach( $traits as $trait)
                @if($trait["traittype"]== "face")
                <div class="selection-icon">
                    <input type="radio" name="facetrait" id="{{$trait["traitname"]}}" value="{{$trait["traitname"]}}" >
                    <label for="{{$trait["traitname"]}}"><img src="/trait/genform/{{$trait["traitid"]}}"   title="{{$trait["traitname"]}}"></label>
                </div>
                @endif
                @endforeach
            
            </fieldset>

       
            <fieldset >
                <legend>BodyTraits</legend>
                <!-- BODY NONE OPTION -->
                <div class="selection-icon">
                <input type="radio" name="bodytrait" id="bnone" value="none" checked>
                <label for="bnone"><img src="{{asset('storage/none-icon.png')}}"   title="none"></label>
                </div>

                <!-- BODY OPTIONS -->
                @foreach( $traits as $trait)
                @if($trait["traittype"]== "body")
                <div class="selection-icon">
                    <input type="radio" name="bodytrait" id="{{$trait["traitname"]}}" value="{{$trait["traitname"]}}" >
                    <label for="{{$trait["traitname"]}}"><img src="/trait/genform/{{$trait["traitid"]}}"   title="{{$trait["traitname"]}}"></label>
                </div>
                @endif
                @endforeach
            
            </fieldset>

            
    </div>

    <!-- MOTHE INFORMATION STARTS HERE -->
    <!-- MOTHE INFORMATION STARTS HERE -->
    <!-- MOTHE INFORMATION STARTS HERE -->


<div id="femaleinputs" style="display: flex; flex-wrap: wrap;"">

    <fieldset >
        <legend>Eye Color</legend>
        <select id="eyeCol2" name="eyeCol2"  onchange="changeEye2(this);" >
            <option style="background-color: #000000; color: white;">#000000</option>
            <option style="background-color: #FF0000; ">#FF0000</option>
            <option style="background-color: #AA0000;color: white;">#AA0000</option>
            <option style="background-color: #0000AA;color: white;">#0000AA</option>
            <option style="background-color: #0000FF;color: white;">#0000FF</option>
            <option style="background-color: #00FF00">#00FF00</option>
            <option style="background-color: #00AA00">#00AA00</option>
        </select>
        <div id="eyeCol2div">
        </div>
    </fieldset>
    <fieldset>
        <legend>Coat Color</legend>
        <select name="baseCol2"  id="baseCol2" onchange="changeBase2(this);">
            <option style="background-color: #000000; color: white;">#000000</option>
            <option style="background-color: #FF0000; ">#FF0000</option>
            <option style="background-color: #AA0000;color: white;">#AA0000</option>
            <option style="background-color: #0000AA;color: white;">#0000AA</option>
            <option style="background-color: #0000FF;color: white;">#0000FF</option>
            <option style="background-color: #00FF00">#00FF00</option>
            <option style="background-color: #00AA00">#00AA00</option>
        </select>
        <div id="baseCol2div">
        </div>
    </fieldset>

    <fieldset>
        <legend>Hair Color</legend>
        <select name="hairCol2"  id="hairCol2" onchange="changeHair2(this);">
            <option style="background-color: #000000; color: white;">#000000</option>
            <option style="background-color: #FF0000; ">#FF0000</option>
            <option style="background-color: #AA0000;color: white;">#AA0000</option>
            <option style="background-color: #0000AA;color: white;">#0000AA</option>
            <option style="background-color: #0000FF;color: white;">#0000FF</option>
            <option style="background-color: #00FF00">#00FF00</option>
            <option style="background-color: #00AA00">#00AA00</option>
        </select>
        <div id="hairCol2div">
        </div>
    </fieldset>
    <fieldset>
        <legend>Hair Color (II)</legend>
        <select name="hairCol22"  id="hairCol22" onchange="changeHair22(this);">
            <option style="background-color: #000000; color: white;">#000000</option>
            <option style="background-color: #FF0000; ">#FF0000</option>
            <option style="background-color: #AA0000;color: white;">#AA0000</option>
            <option style="background-color: #0000AA;color: white;">#0000AA</option>
            <option style="background-color: #0000FF;color: white;">#0000FF</option>
            <option style="background-color: #00FF00">#00FF00</option>
            <option style="background-color: #00AA00">#00AA00</option>
        </select>
        <div id="hairCol22div">
        </div>
    </fieldset>
    <fieldset>
        <legend>Accent Color</legend>
        <select name="accentCol2"  id="accentCol2" onchange="changeAccent2(this);">
            <option style="background-color: #000000; color: white;">#000000</option>
            <option style="background-color: #FF0000; ">#FF0000</option>
            <option style="background-color: #AA0000;color: white;">#AA0000</option>
            <option style="background-color: #0000AA;color: white;">#0000AA</option>
            <option style="background-color: #0000FF;color: white;">#0000FF</option>
            <option style="background-color: #00FF00">#00FF00</option>
            <option style="background-color: #00AA00">#00AA00</option>
        </select>
        <div id="accentCol2div">
        </div>
    </fieldset>
    <fieldset>
        <legend>Accent Color</legend>
        <select name="accentCol22"  id="accentCol22" onchange="changeAccent22(this);">
            <option style="background-color: #000000; color: white;">#000000</option>
            <option style="background-color: #FF0000; ">#FF0000</option>
            <option style="background-color: #AA0000;color: white;">#AA0000</option>
            <option style="background-color: #0000AA;color: white;">#0000AA</option>
            <option style="background-color: #0000FF;color: white;">#0000FF</option>
            <option style="background-color: #00FF00">#00FF00</option>
            <option style="background-color: #00AA00">#00AA00</option>
        </select>
        <div id="accentCol22div">
        </div>
    </fieldset>
    <!--END OF COLORS -->
    <fieldset >
        <legend>Pony Breed</legend>
        <!-- UNICORN OPTION -->
        <div class="selection-icon">
            <input type="radio" name="typeName2" id="Unicorn2" value="Unicorn" checked>
            <label for="Unicorn2">  <img src="{{asset('storage/UNI-ICON.png')}}" title="Unicorn"></label>
        </div>
        <!-- DRAGON OPTION -->
        <div class="selection-icon">
        <input type="radio" name="typeName2" id="Dragon2" value="Dragon" >
        <label for="Dragon2">  <img src="{{asset('storage/DRAGON-ICON.png')}}" title="Dragon"></label>
        </div>
        <!-- AVIAN OPTION -->
        <div class="selection-icon">
        <input type="radio" name="typeName2" id="Avian2" value="Avian" >
        <label for="Avian2">  <img src="{{asset('storage/AVIAN-ICON.png')}}" title="Avian"></label>
        </div>
        <!-- KITTLING OPTION -->
        <div class="selection-icon">
        <input type="radio" name="typeName2" id="Kittling2" value="Kittling2" >
        <label for="Kittling2">  <img src="{{asset('storage/KITT-ICON.png')}}" title="Kittling"></label>
        </div>
    </fieldset>

    <fieldset >
        <legend>Hair Traits</legend>
            <!-- HAIR NONE OPTION -->
            <div class="selection-icon">
                <input type="radio" name="hairtrait2" id="hnone2" value="none" checked>
                <label for="hnone2"><img src="{{asset('storage/none-icon.png')}}"   title="none"></label>
        </div>

            <!-- HAIR OPTIONS -->
            @foreach( $traits as $trait)
            @if($trait["traittype"]== "hair")
            <div class="selection-icon">
                <input type="radio" name="hairtrait2" id="{{$trait["traitname"]}}2" value="{{$trait["traitname"]}}" >
                <label for="{{$trait["traitname"]}}2"><img src="/trait/genform/{{$trait["traitid"]}}"   title="{{$trait["traitname"]}}"></label>
            </div>
            @endif
            @endforeach
            
    </fieldset>
    
    <fieldset >
        <legend>Face Traits</legend>
        <!-- FACE NONE OPTION -->
        <div class="selection-icon">
        <input type="radio" name="facetrait2" id="fnone2" value="none" checked>
        <label for="fnone2"><img src="{{asset('storage/none-icon.png')}}" title="none"></label>
    </div>

        <!-- FACE OPTIONS -->
        @foreach( $traits as $trait)
        @if($trait["traittype"]== "face")
        <div class="selection-icon">
            <input type="radio" name="facetrait2" id="{{$trait["traitname"]}}2" value="{{$trait["traitname"]}}" >
            <label for="{{$trait["traitname"]}}2"><img src="/trait/genform/{{$trait["traitid"]}}"   title="{{$trait["traitname"]}}"></label>
        </div>
        @endif
        @endforeach
    
    </fieldset>
    <fieldset >
        <legend>Body Traits</legend>
        <!-- BODY NONE OPTION -->
        <div class="selection-icon">
        <input type="radio" name="bodytrait2" id="bnone2" value="none" checked>
        <label for="bnone2"><img src="{{asset('storage/none-icon.png')}}"   title="none"></label>
    </div>

        <!-- BODY OPTIONS -->
        @foreach( $traits as $trait)
        @if($trait["traittype"]== "body")
        <div class="selection-icon">
            <input type="radio" name="bodytrait2" id="{{$trait["traitname"]}}2" value="{{$trait["traitname"]}}" >
            <label for="{{$trait["traitname"]}}2"><img src="/trait/genform/{{$trait["traitid"]}}"   title="{{$trait["traitname"]}}"></label>
        </div>
        @endif
        @endforeach
    
    </fieldset>
</div>
</div> <!-- MOTHE INFORMATION ENDS HERE -->
<fieldset style="width: 50%; margin-left: auto;
    margin-right: auto; justify-content: center;">
<button class="button-8" type="submit" style="width: 200px !important; height: 50px !important; font-size: 26px !important;">Generate</button>
</fieldset>
</form>


<img id="image" src="http://localhost:8000/storage/users/0merged.png?">
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

  
<script type="text/javascript" src="{{ asset('js/ponygen.js') }}" ></script>
@endsection