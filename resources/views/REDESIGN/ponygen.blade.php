@extends('REDESIGN/redesign')
@section('title')Pony Generator @endsection


@section('bodysection')
<div class="generator">  
    <div class="forminputs">
        <form>
            
            <fieldset class="sex">
                <div class="selection-icon">
                    <input type="radio" name="sex" id="female" value="female" >
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
                
                    <fieldset class="hexcolor">
                        <legend><i class="fa-solid fa-eye"></i>  Eyes:</legend>
                        <div class="hexselect">
                            <input type="radio" id="eyeCol1" name="eyeCol">
                            <label for="eyeCol1"><img src="{{asset('storage/images/WHITEHEX.png')}}"></label>
                            <input type="radio" id="eyeCol2" name="eyeCol">
                            <label for="eyeCol2"><img src="{{asset('storage/images/YELLOWHEX.png')}}"></label>
                            <input type="radio" id="eyeCol3" name="eyeCol">
                            <label for="eyeCol3"><img src="{{asset('storage/images/GOLDHEX.png')}}"></label>
                            <input type="radio" id="eyeCol6" name="eyeCol">
                            <label for="eyeCol6"><img src="{{asset('storage/images/CYANHEX.png')}}"></label>
                            <input type="radio" id="eyeCol7" name="eyeCol">
                            <label for="eyeCol7"><img src="{{asset('storage/images/DARKCYANHEX.png')}}"></label>
                            <input type="radio" id="eyeCol4" name="eyeCol">
                            <label for="eyeCol4"><img src="{{asset('storage/images/MAGENTAHEX.png')}}"></label>
                            <input type="radio" id="eyeCol5" name="eyeCol">
                            <label for="eyeCol5"><img src="{{asset('storage/images/DARKMAGENTAHEX.png')}}"></label>

                        </div>
                    </fieldset>

                    <fieldset class="hexcolor">
                        <legend><i class="fa-solid fa-horse"></i>  Coat:</legend>
                        <div class="hexselect">
                            <input type="radio" id="baseCol1" name="baseCol">
                            <label for="baseCol1"><img src="{{asset('storage/images/WHITEHEX.png')}}"></label>
                            <input type="radio" id="baseCol2" name="baseCol">
                            <label for="baseCol2"><img src="{{asset('storage/images/YELLOWHEX.png')}}"></label>
                            <input type="radio" id="baseCol3" name="baseCol">
                            <label for="baseCol3"><img src="{{asset('storage/images/GOLDHEX.png')}}"></label>
                            <input type="radio" id="baseCol6" name="baseCol">
                            <label for="baseCol6"><img src="{{asset('storage/images/CYANHEX.png')}}"></label>
                            <input type="radio" id="baseCol7" name="baseCol">
                            <label for="baseCol7"><img src="{{asset('storage/images/DARKCYANHEX.png')}}"></label>
                            <input type="radio" id="baseCol4" name="baseCol">
                            <label for="baseCol4"><img src="{{asset('storage/images/MAGENTAHEX.png')}}"></label>
                            <input type="radio" id="baseCol5" name="baseCol">
                            <label for="baseCol5"><img src="{{asset('storage/images/DARKMAGENTAHEX.png')}}"></label>


                        </div>
                    </fieldset>

                    <fieldset class="hexcolor">
                        <legend><i class="fa-solid fa-scissors"></i>Hair (1):</legend>
                        <div class="hexselect">
                            <input type="radio" id="hairCol1" name="hairCol">
                            <label for="hairCol1"><img src="{{asset('storage/images/WHITEHEX.png')}}"></label>
                            <input type="radio" id="hairCol2" name="hairCol">
                            <label for="hairCol2"><img src="{{asset('storage/images/YELLOWHEX.png')}}"></label>
                            <input type="radio" id="hairCol3" name="hairCol">
                            <label for="hairCol3"><img src="{{asset('storage/images/GOLDHEX.png')}}"></label>
                            <input type="radio" id="hairCol6" name="hairCol">
                            <label for="hairCol6"><img src="{{asset('storage/images/CYANHEX.png')}}"></label>
                            <input type="radio" id="hairCol7" name="hairCol">
                            <label for="hairCol7"><img src="{{asset('storage/images/DARKCYANHEX.png')}}"></label>
                            <input type="radio" id="hairCol4" name="hairCol">
                            <label for="hairCol4"><img src="{{asset('storage/images/MAGENTAHEX.png')}}"></label>
                            <input type="radio" id="hairCol5" name="hairCol">
                            <label for="hairCol5"><img src="{{asset('storage/images/DARKMAGENTAHEX.png')}}"></label>

                        </div>
                    </fieldset>

                    <fieldset class="hexcolor">
                        <legend><i class="fa-solid fa-scissors"></i>Hair (2):</legend>
                        <div class="hexselect">
                            <input type="radio" id="hairCol211" name="hairCol21">
                            <label for="hairCol211"><img src="{{asset('storage/images/WHITEHEX.png')}}"></label>
                            <input type="radio" id="hairCol212" name="hairCol21">
                            <label for="hairCol212"><img src="{{asset('storage/images/YELLOWHEX.png')}}"></label>
                            <input type="radio" id="hairCol213" name="hairCol21">
                            <label for="hairCol213"><img src="{{asset('storage/images/GOLDHEX.png')}}"></label>
                            <input type="radio" id="hairCol216" name="hairCol21">
                            <label for="hairCol216"><img src="{{asset('storage/images/CYANHEX.png')}}"></label>
                            <input type="radio" id="hairCol217" name="hairCol21">
                            <label for="hairCol217"><img src="{{asset('storage/images/DARKCYANHEX.png')}}"></label>
                            <input type="radio" id="hairCol214" name="hairCol21">
                            <label for="hairCol214"><img src="{{asset('storage/images/MAGENTAHEX.png')}}"></label>
                            <input type="radio" id="hairCol215" name="hairCol21">
                            <label for="hairCol215"><img src="{{asset('storage/images/DARKMAGENTAHEX.png')}}"></label>

                        </div>
                    </fieldset>

                    <fieldset class="hexcolor">
                        <legend><i class="fa-solid fa-brush"></i>Accent (1):</legend>
                        <div class="hexselect">
                            <input type="radio" id="accentCol1" name="accentCol">
                            <label for="accentCol1"><img src="{{asset('storage/images/WHITEHEX.png')}}"></label>
                            <input type="radio" id="accentCol2" name="accentCol">
                            <label for="accentCol2"><img src="{{asset('storage/images/YELLOWHEX.png')}}"></label>
                            <input type="radio" id="accentCol3" name="accentCol">
                            <label for="accentCol3"><img src="{{asset('storage/images/GOLDHEX.png')}}"></label>
                            <input type="radio" id="accentCol6" name="accentCol">
                            <label for="accentCol6"><img src="{{asset('storage/images/CYANHEX.png')}}"></label>
                            <input type="radio" id="accentCol7" name="accentCol">
                            <label for="accentCol7"><img src="{{asset('storage/images/DARKCYANHEX.png')}}"></label>
                            <input type="radio" id="accentCol4" name="accentCol">
                            <label for="accentCol4"><img src="{{asset('storage/images/MAGENTAHEX.png')}}"></label>
                            <input type="radio" id="accentCol5" name="accentCol">
                            <label for="accentCol5"><img src="{{asset('storage/images/DARKMAGENTAHEX.png')}}"></label>

                        </div>
                    </fieldset>

                    <fieldset class="hexcolor">
                        <legend><i class="fa-solid fa-brush"></i>Accent (2):</legend>
                        <div class="hexselect">
                            <input type="radio" id="accentCol211" name="accentCol21">
                            <label for="accentCol211"><img src="{{asset('storage/images/WHITEHEX.png')}}"></label>
                            <input type="radio" id="accentCol212" name="accentCol21">
                            <label for="accentCol212"><img src="{{asset('storage/images/YELLOWHEX.png')}}"></label>
                            <input type="radio" id="accentCol213" name="accentCol21">
                            <label for="accentCol213"><img src="{{asset('storage/images/GOLDHEX.png')}}"></label>
                            <input type="radio" id="accentCol216" name="accentCol21">
                            <label for="accentCol216"><img src="{{asset('storage/images/CYANHEX.png')}}"></label>
                            <input type="radio" id="accentCol217" name="accentCol21">
                            <label for="accentCol217"><img src="{{asset('storage/images/DARKCYANHEX.png')}}"></label>
                            <input type="radio" id="accentCol214" name="accentCol21">
                            <label for="accentCol214"><img src="{{asset('storage/images/MAGENTAHEX.png')}}"></label>
                            <input type="radio" id="accentCol215" name="accentCol21">
                            <label for="accentCol215"><img src="{{asset('storage/images/DARKMAGENTAHEX.png')}}"></label>

                        </div>
                    </fieldset>

                    <fieldset class="traits">
                        <legend>Hair Trait:</legend>
                        <div class="traitselect">
                            <input type="radio" id="hnone" name="hairtrait" value="none">
                            <label for="hnone"><p>None</p><img src="{{asset('storage/images/none-icon.png')}}"></label>
                            <input type="radio" id="hfade" name="hairtrait" value="hfade">
                            <label for="hfade"><p>Hair Fade</p><img src="{{asset('storage/images/hairfade-icon.png')}}"></label>
                            <input type="radio" id="hstreak" name="hairtrait" value="hstreak">
                            <label for="hstreak"><p>Hair Streak</p><img src="{{asset('storage/images/hairstreak-icon.png')}}"></label>
                            
                        </div>
                    </fieldset>

                    <fieldset class="traits">
                        <legend>Face Trait:</legend>
                        <div class="traitselect">
                            <input type="radio" id="fnone" name="facetrait" value="none">
                            <label for="fnone"><p>None</p><img src="{{asset('storage/images/none-icon.png')}}"></label>
                            <input type="radio" id="ffade" name="facetrait" value="ffade">
                            <label for="ffade"><p>Face Fade</p><img src="{{asset('storage/images/FACEFade-icon.png')}}"></label>
                            <input type="radio" id="fblaze" name="facetrait" value="fblaze">
                            <label for="fblaze"><p>Face Blaze</p><img src="{{asset('storage/images/faceblaze-icon.png')}}"></label>
                            <input type="radio" id="fvulp" name="facetrait" value="fvulp">
                            <label for="fvulp"><p>Face Vulpine</p><img src="{{asset('storage/images/fvulpine-icon.png')}}"></label>
                            
                        </div>
                    </fieldset>

                    <fieldset class="traits">
                        <legend>Body Trait:</legend>
                        <div class="traitselect">
                            <input type="radio" id="bnone" name="bodytrait" value="none">
                            <label for="bnone"><p>None</p><img src="{{asset('storage/images/none-icon.png')}}"></label>
                            <input type="radio" id="paint" name="bodytrait" value="paint">
                            <label for="paint"><p>Paint</p><img src="{{asset('storage/images/paint-icon.png')}}"></label>
                       
                        </div>
                    </fieldset>


                </div><!--END OF FEMALE FIELDSET-->
                <!--START OF MALE COLOR GENERATOR ICONS-->
                <div class="genmale">
                    <div class="gencontainertop"><h3>Sire</h3><img src="{{asset('storage/images/shine.svg')}}"></div>

                    <fieldset class="hexcolor">
                        <legend><i class="fa-solid fa-eye"></i>  Eyes:</legend>
                        <div class="hexselect">
                            <input type="radio" id="eyeCol21" name="eyeCol2">
                            <label for="eyeCol21"><img src="{{asset('storage/images/BLACKHEX.png')}}"></label>
                            <input type="radio" id="eyeCol22" name="eyeCol2">
                            <label for="eyeCol22"><img src="{{asset('storage/images/REDHEX.png')}}"></label>
                            <input type="radio" id="eyeCol23" name="eyeCol2">
                            <label for="eyeCol23"><img src="{{asset('storage/images/DARKRED.png')}}"></label>
                            <input type="radio" id="eyeCol26" name="eyeCol2">
                            <label for="eyeCol26"><img src="{{asset('storage/images/GREENHEX.png')}}"></label>
                            <input type="radio" id="eyeCol27" name="eyeCol2">
                            <label for="eyeCol27"><img src="{{asset('storage/images/DARKGREEN.png')}}"></label>
                            <input type="radio" id="eyeCol24" name="eyeCol2">
                            <label for="eyeCol24"><img src="{{asset('storage/images/BLUEHEX.png')}}"></label>
                            <input type="radio" id="eyeCol25" name="eyeCol2">
                            <label for="eyeCol25"><img src="{{asset('storage/images/DARKBLUE.png')}}"></label>

                        </div>
                    </fieldset>

                    <fieldset class="hexcolor">
                        <legend><i class="fa-solid fa-horse"></i>  Coat:</legend>
                        <div class="hexselect">
                            <input type="radio" id="baseCol21" name="baseCol2">
                            <label for="baseCol21"><img src="{{asset('storage/images/BLACKHEX.png')}}"></label>
                            <input type="radio" id="baseCol22" name="baseCol2">
                            <label for="baseCol22"><img src="{{asset('storage/images/REDHEX.png')}}"></label>
                            <input type="radio" id="baseCol23" name="baseCol2">
                            <label for="baseCol23"><img src="{{asset('storage/images/DARKRED.png')}}"></label>
                            <input type="radio" id="baseCol26" name="baseCol2">
                            <label for="baseCol26"><img src="{{asset('storage/images/GREENHEX.png')}}"></label>
                            <input type="radio" id="baseCol27" name="baseCol2">
                            <label for="baseCol27"><img src="{{asset('storage/images/DARKGREEN.png')}}"></label>
                            <input type="radio" id="baseCol24" name="baseCol2">
                            <label for="baseCol24"><img src="{{asset('storage/images/BLUEHEX.png')}}"></label>
                            <input type="radio" id="baseCol25" name="baseCol2">
                            <label for="baseCol25"><img src="{{asset('storage/images/DARKBLUE.png')}}"></label>


                        </div>
                    </fieldset>

                    <fieldset class="hexcolor">
                        <legend><i class="fa-solid fa-scissors"></i>Hair (1):</legend>
                        <div class="hexselect">
                            <input type="radio" id="hairCol21" name="hairCol2">
                            <label for="hairCol21"><img src="{{asset('storage/images/BLACKHEX.png')}}"></label>
                            <input type="radio" id="hairCol22" name="hairCol2">
                            <label for="hairCol22"><img src="{{asset('storage/images/REDHEX.png')}}"></label>
                            <input type="radio" id="hairCol23" name="hairCol2">
                            <label for="hairCol23"><img src="{{asset('storage/images/DARKRED.png')}}"></label>
                            <input type="radio" id="hairCol26" name="hairCol2">
                            <label for="hairCol26"><img src="{{asset('storage/images/GREENHEX.png')}}"></label>
                            <input type="radio" id="hairCol27" name="hairCol2">
                            <label for="hairCol27"><img src="{{asset('storage/images/DARKGREEN.png')}}"></label>
                            <input type="radio" id="hairCol24" name="hairCol2">
                            <label for="hairCol24"><img src="{{asset('storage/images/BLUEHEX.png')}}"></label>
                            <input type="radio" id="hairCol25" name="hairCol2">
                            <label for="hairCol25"><img src="{{asset('storage/images/DARKBLUE.png')}}"></label>

                        </div>
                    </fieldset>

                    <fieldset class="hexcolor">
                        <legend><i class="fa-solid fa-scissors"></i>Hair (2):</legend>
                        <div class="hexselect">
                            <input type="radio" id="hairCol221" name="hairCol22">
                            <label for="hairCol221"><img src="{{asset('storage/images/BLACKHEX.png')}}"></label>
                            <input type="radio" id="hairCol222" name="hairCol22">
                            <label for="hairCol222"><img src="{{asset('storage/images/REDHEX.png')}}"></label>
                            <input type="radio" id="hairCol223" name="hairCol22">
                            <label for="hairCol223"><img src="{{asset('storage/images/DARKRED.png')}}"></label>
                            <input type="radio" id="hairCol226" name="hairCol22">
                            <label for="hairCol226"><img src="{{asset('storage/images/GREENHEX.png')}}"></label>
                            <input type="radio" id="hairCol227" name="hairCol22">
                            <label for="hairCol227"><img src="{{asset('storage/images/DARKGREEN.png')}}"></label>
                            <input type="radio" id="hairCol224" name="hairCol22">
                            <label for="hairCol224"><img src="{{asset('storage/images/BLUEHEX.png')}}"></label>
                            <input type="radio" id="hairCol225" name="hairCol22">
                            <label for="hairCol225"><img src="{{asset('storage/images/DARKBLUE.png')}}"></label>

                        </div>
                    </fieldset>

                    <fieldset class="hexcolor">
                        <legend><i class="fa-solid fa-brush"></i>Accent (1):</legend>
                        <div class="hexselect">
                            <input type="radio" id="accentCol21" name="accentCol2">
                            <label for="accentCol21"><img src="{{asset('storage/images/BLACKHEX.png')}}"></label>
                            <input type="radio" id="accentCol22" name="accentCol2">
                            <label for="accentCol22"><img src="{{asset('storage/images/REDHEX.png')}}"></label>
                            <input type="radio" id="accentCol23" name="accentCol2">
                            <label for="accentCol23"><img src="{{asset('storage/images/DARKRED.png')}}"></label>
                            <input type="radio" id="accentCol26" name="accentCol2">
                            <label for="accentCol26"><img src="{{asset('storage/images/GREENHEX.png')}}"></label>
                            <input type="radio" id="accentCol27" name="accentCol2">
                            <label for="accentCol27"><img src="{{asset('storage/images/DARKGREEN.png')}}"></label>
                            <input type="radio" id="accentCol24" name="accentCol2">
                            <label for="accentCol24"><img src="{{asset('storage/images/BLUEHEX.png')}}"></label>
                            <input type="radio" id="accentCol25" name="accentCol2">
                            <label for="accentCol25"><img src="{{asset('storage/images/DARKBLUE.png')}}"></label>

                        </div>
                    </fieldset>

                    <fieldset class="hexcolor">
                        <legend><i class="fa-solid fa-brush"></i>Accent (2):</legend>
                        <div class="hexselect">
                            <input type="radio" id="accentCol221" name="accentCol22">
                            <label for="accentCol221"><img src="{{asset('storage/images/BLACKHEX.png')}}"></label>
                            <input type="radio" id="accentCol222" name="accentCol22">
                            <label for="accentCol222"><img src="{{asset('storage/images/REDHEX.png')}}"></label>
                            <input type="radio" id="accentCol223" name="accentCol22">
                            <label for="accentCol223"><img src="{{asset('storage/images/DARKRED.png')}}"></label>
                            <input type="radio" id="accentCol226" name="accentCol22">
                            <label for="accentCol226"><img src="{{asset('storage/images/GREENHEX.png')}}"></label>
                            <input type="radio" id="accentCol227" name="accentCol22">
                            <label for="accentCol227"><img src="{{asset('storage/images/DARKGREEN.png')}}"></label>
                            <input type="radio" id="accentCol224" name="accentCol22">
                            <label for="accentCol224"><img src="{{asset('storage/images/BLUEHEX.png')}}"></label>
                            <input type="radio" id="accentCol225" name="accentCol22">
                            <label for="accentCol225"><img src="{{asset('storage/images/DARKBLUE.png')}}"></label>

                        </div>
                    </fieldset>

                    <fieldset class="traits">
                        <legend>Hair Trait:</legend>
                        <div class="traitselect">
                            <input type="radio" id="hnone2" name="hairtrait2" value="none">
                            <label for="hnone2"><p>None</p><img src="{{asset('storage/images/none-icon.png')}}"></label>
                            <input type="radio" id="hfade2" name="hairtrait2" value="hfade">
                            <label for="hfade2"><p>Hair Fade</p><img src="{{asset('storage/images/hairfade-icon.png')}}"></label>
                            <input type="radio" id="hstreak2" name="hairtrait2" value="hstreak">
                            <label for="hstreak2"><p>Hair Streak</p><img src="{{asset('storage/images/hairstreak-icon.png')}}"></label>
                            
                        </div>
                    </fieldset>

                    <fieldset class="traits">
                        <legend>Face Trait:</legend>
                        <div class="traitselect">
                            <input type="radio" id="fnone2" name="facetrait2" value="none">
                            <label for="fnone2"><p>None</p><img src="{{asset('storage/images/none-icon.png')}}"></label>
                            <input type="radio" id="ffade2" name="facetrait2" value="ffade">
                            <label for="ffade2"><p>Face Fade</p><img src="{{asset('storage/images/FACEFade-icon.png')}}"></label>
                            <input type="radio" id="fblaze2" name="facetrait2" value="fblaze">
                            <label for="fblaze2"><p>Face Blaze</p><img src="{{asset('storage/images/faceblaze-icon.png')}}"></label>
                            <input type="radio" id="fvulp2" name="facetrait2" value="fvulp">
                            <label for="fvulp2"><p>Face Vulpine</p><img src="{{asset('storage/images/fvulpine-icon.png')}}"></label>
                            
                        </div>
                    </fieldset>

                    <fieldset class="traits">
                        <legend>Body Trait:</legend>
                        <div class="traitselect">
                            <input type="radio" id="bnone2" name="bodytrait2" value="none">
                            <label for="bnone2"><p>None</p><img src="{{asset('storage/images/none-icon.png')}}"></label>
                            <input type="radio" id="paint2" name="bodytrait2" value="paint">
                            <label for="paint2"><p>Paint</p><img src="{{asset('storage/images/paint-icon.png')}}"></label>
                       
                        </div>
                    </fieldset>

                </div><!--END OF male FIELDSET-->
            </div><!--END OF COLORWRAPPER-->
            <input  class="btn-gold" id="submit" type="submit">
        </form>



    </div><!--END OF FORM INPUTS-->
@endsection