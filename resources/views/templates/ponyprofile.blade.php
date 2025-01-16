<!-- PONY PROFILE -->
@extends('config2')
@section('title')Pony Profile @endsection


@section('config2')
<div id="ponytitle">
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<a href="/previouspony/{{$ponys[0]["ponyid"]}}"><box-icon name='left-arrow-circle' type='solid' color='#00a9ff' ></box-icon></a><h2>{{$ponys[0]["name"]}}</h2><a href="/nextpony/{{$ponys[0]["ponyid"]}}"><box-icon name='right-arrow-circle' type='solid' color='#00a9ff' ></box-icon></a>
</div>
<div id="ponyprofile">

    <div id="ponypic" style="position: relative;">
        <img src="/ponyImage/{{$ponys[0]["ponyid"]}}"/>
        <div id="equipped">
            @if($ponys[0]["Faceware"])
            <img  class="item" src="/item/{{$ponys[0]["Faceware"]}}/{{$ponys[0]["typeid"]}}" style="position: absolute; top: 0;">@endif
            @if($ponys[0]["Headware"])
            <img  class="item" src="/item/{{$ponys[0]["Headware"]}}/{{$ponys[0]["typeid"]}}" style="position: absolute;  top: 0;">@endif
            @if($ponys[0]["Hooveware"])
            <img  class="item" src="/item/{{$ponys[0]["Hooveware"]}}/{{$ponys[0]["typeid"]}}" style="position: absolute;  top: 0;">@endif
            @if($ponys[0]["Tailware"])
            <img  class="item" src="/item/{{$ponys[0]["Tailware"]}}/{{$ponys[0]["typeid"]}}" style="position: absolute;  top: 0;">@endif
            @if($ponys[0]["Bodyware"])
            <img  class="item" src="/item/{{$ponys[0]["Bodyware"]}}/{{$ponys[0]["typeid"]}}" style="position: absolute;  top: 0;">@endif
            @if($ponys[0]["Neckware"])
            <img  class="item" src="/item/{{$ponys[0]["Neckware"]}}/{{$ponys[0]["typeid"]}}" style="position: absolute;  top: 0;">@endif
        </div>
    </div>
    <div id="ponystats">
        <h4>Health:{{$ponys[0]["health"]}}/100</h4>
        <div id="ponybars" style="width: 90%; margin-top: 20px;">
                    <div class="progress" style="margin-left: 30px; border: 3px solid white; height: 20px;">
                        <div class="progress-bar bg-danger"  role="progressbar" aria-valuenow="{{$ponys[0]["health"]}}"
                        aria-valuemin="0" aria-valuemax="100" style="width:{{$ponys[0]["health"]}}%">
                        <span class="sr-only">{{$ponys[0]["health"]}} / 100</span>
                        </div>
                    </div>
                    <img src="{{asset('storage/healthheart.png')}}" style="margin-left: 20px; margin-top: -40px; width: 30px;">

            <h4>Hunger:{{$ponys[0]["hunger"]}}/100</h4>
            <div class="progress" style="margin-left: 30px; border: 3px solid white; height: 20px;">
                        <div class="progress-bar bg-success"  role="progressbar" aria-valuenow="{{$ponys[0]["hunger"]}}"
                        aria-valuemin="0" aria-valuemax="100" style="width:{{$ponys[0]["hunger"]}}%">
                        <span class="sr-only">{{$ponys[0]["hunger"]}} / 100</span>
                        </div>
                    </div>
                    <img src="{{asset('storage/foodapple.png')}}" style="margin-left: 20px; margin-top: -40px; width: 30px;">
        </div>
       <div id="colorset">
        <table>
            <tr>
                <td> Coat:</td>
                <td><div class="coloricon" style="background-color: #{{$ponys[0]["baseCol"]}};"></div></td>
                <td id="cc">#{{$ponys[0]["baseCol"]}}</td>
            </tr>
            <tr>
                <td>Eye:</td>
                <td><div class="coloricon" style="background-color: #{{$ponys[0]["eyeCol"]}};"></div></td>
                <td id="cc">#{{$ponys[0]["eyeCol"]}}</td>
            </tr>
            <tr>
                <td>Accent: </td>
                <td><div class="coloricon" style="background-color: #{{$ponys[0]["accentCol"]}};"></div></td>
                <td id="cc">#{{$ponys[0]["accentCol"]}}</td>
                <td><div class="coloricon" style="background-color: #{{$ponys[0]["accentCol2"]}};"></div></td>
                <td id="cc">#{{$ponys[0]["accentCol2"]}}</td>
            </tr>
            <tr>
                <td>Hair: </td>
                <td><div class="coloricon" style="background-color: #{{$ponys[0]["hairCol"]}};"></div></td>
                <td id="cc">#{{$ponys[0]["hairCol"]}}</td>
                <td><div class="coloricon" style="background-color: #{{$ponys[0]["hairCol2"]}};"></div></td>
                <td id="cc">#{{$ponys[0]["hairCol2"]}}</td>
            </tr>
        </table>
        <!-- START EXPERIENCE INFORMATION -->
                <div id="levelinfo">
                    <div id="level" style="width: 20%;">
                        <h4>Level</h4>
                        <center>{{$ponys[0]["level"]}}</center>
                    </div>
        
                    <div id="exp" style=" width: 78%;" >
                        <h4>Exp:{{$ponys[0]["exp"]}}/100</h4>
                        <div class="progress" style="margin-left: 30px; border: 3px solid white; height: 20px;">
                            <div class="progress-bar bg-warning"  role="progressbar" aria-valuenow="{{$ponys[0]["hunger"]}}"
                            aria-valuemin="0" aria-valuemax="100" style="width:{{$ponys[0]["hunger"]}}%">
                            <span class="sr-only">{{$ponys[0]["hunger"]}} / 100</span>
                            </div>
                        </div>
                        <img src="{{asset('storage/explight.png')}}" style="margin-left: 20px; margin-top: -40px; width: 30px;">
                    </div>
                </div>
    <!-- END OF EXPERIENCE INFORMATION -->
    <!-- PET STAT INFORMATION -->
       <table style="height: 50px;">
        <tr>
            <th>Intelligence</th>
            <th>Charm</th>
            <th>Strength</th>
        </tr>
        <tr>
            <td>{{$ponys[0]["intel"]}}</td>
            <td>{{$ponys[0]["charm"]}}</td>
            <td>{{$ponys[0]["str"]}}</td>
        </tr>
       </table>
       <!-- END  PET STAT INFORMATION -->
        <div id="ponyquest">
            <button class="button-8">Quest</button>
        </div>
     
       </div>

    </div>
</div>

<div class="main-content">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        
        <li class="nav-item nav-button" role="presentation">
          <button class="nav-button nav-link active" id="page-tab" data-bs-toggle="tab" data-bs-target="#page" type="button" role="tab" aria-controls="page" aria-selected="true">Pony Profile</button>
        </li>
        <li class="nav-item nav-button" role="presentation">
            <button class="nav-button nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="false">Special Traits</button>
          </li>
        <li class="nav-item nav-button" role="presentation">
          <button class="nav-button nav-link nav-button" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Inventory</button>
        </li>
        <li class="nav-item nav-button" role="presentation">
          <button class="nav-button nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Edit</button>
        </li>
        <li class="nav-item nav-button" role="presentation">
            <button class="nav-button nav-link" id="lineage-tab" data-bs-toggle="tab" data-bs-target="#lineage" type="button" role="tab" aria-controls="lineage" aria-selected="false">Lineage</button>
          </li>
      </ul>
      <!--CONTENT TABS HERE -->
      <div class="tab-content tab-shape" id="myTabContent">
        <div class="tab-pane fade show active" id="page" role="tabpanel" aria-labelledby="page-tab">

                <table id="ponyprofiletable">
                    <tr><th>Birthday</th><th>Sex</th><th>Breed</th>
                    </tr>
                    <tr>
                        <td>{{$ponys[0]["created_at"]}}</td>
                        <td>{{$ponys[0]["sex"]}}</td>
                        <td>@if($ponys[0]["typeid"]==8 || $ponys[0]["typeid"]==4)
                            Unicorn
                            @elseif($ponys[0]["typeid"]==1 || $ponys[0]["typeid"]== 5)
                            Dragon
                            @elseif($ponys[0]["typeid"]==2 || $ponys[0]["typeid"]== 6)
                            Avian
                            @elseif($ponys[0]["typeid"]==3 || $ponys[0]["typeid"]== 7)
                            Kittling
                            @endif
                        </td>
                    </tr>
                </table>

                Now I can give my pony a profile?
           

        </div>
        <!--END TAB DIV HERE -->
        <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab"> 
            <div class="config config3-large">
           
            @include('ponypage.tab1')
         </div>
           
        </div>
        <!--END TAB DIV HERE -->
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <!-- INVENTORY DISPLAY HERE -->
            <div class="inventoryfilter">
                <h4>Equipped</h4>
                <!-- EQUIP OR UNEQUIP ITEMS -->
                <form action="/unequip/{{$ponys[0]["ponyid"]}}" method="POST" style="display: inline-flex; flex-wrap: wrap; width: 100%; justify-content: space-evenly;">
                    @csrf
                    @method('Post')
                
                @if($ponys[0]["Faceware"])
                <div class="selection-icon">
                <input type="checkbox" id="Faceware" name="Faceware" value="{{$ponys[0]["Faceware"]}}">
                <label for="Faceware">Faceware<br>
                    <img  class="item" src="/item/{{$ponys[0]["Faceware"]}}/icon" width="120;"></label></div>@endif


                <!--Equipped NECKWARE-->
                @if($ponys[0]["Neckware"])
                <div class="selection-icon">
                <input type="checkbox" id="Neckware" name="Neckware" value="{{$ponys[0]["Neckware"]}}">
                <label for="Neckware">Neckware<br>
                <img  class="item" src="/item/{{$ponys[0]["Neckware"]}}/icon" width="120;" ></label></div>@endif

                <!--Equipped Body-->
                
                @if($ponys[0]["Bodyware"])
                <div class="selection-icon">
                <input type="checkbox" id="Bodyware" name="Bodyware" value="{{$ponys[0]["Bodyware"]}}">
                <label for="Bodyware">Bodyware<br>
                <img  class="item" src="/item/{{$ponys[0]["Bodyware"]}}/icon" width="120;"></label></div>@endif

                <!--Equipped HEADWARE-->
                @if($ponys[0]["Headware"])
                <div class="selection-icon">
                <input type="checkbox" id="Headware" name="Headware" value="{{$ponys[0]["Headware"]}}">
                <label for="Headware">Headware<br>
                <img  class="item" src="/item/{{$ponys[0]["Headware"]}}/icon" width="120;" ></label></div>@endif

                 <!--Equipped HOOVEWARE-->
                 @if($ponys[0]["Hooveware"])
                 <div class="selection-icon">
                 <input type="checkbox" id="Hooveware" name="Hooveware" value="{{$ponys[0]["Hooveware"]}}">
                 <label for="Hooveware">Hooveware<br>
                 <img  class="item" src="/item/{{$ponys[0]["Hooveware"]}}/icon" width="120;"></label></div>@endif
                  
                <!--Equipped TAILWARE-->
                  @if($ponys[0]["Tailware"])
                  
                  <div class="selection-icon">
                  <input type="checkbox" id="Tailware" name="Tailware" value="{{$ponys[0]["Tailware"]}}">
                  <label for="Tailware">Tailware<br>
                  <img  class="item" src="/item/{{$ponys[0]["Tailware"]}}/icon" width="120;" ></label>
                  </div>@endif
                
                  <div style="width: 100%; margin-top: 20px;"><center><button class="button-8" type="submit">Unequip</button></center></div>
                   
                </form>
                <!--END OF EQUIP OR UNEQUIP ITEMS -->
            </div>
              <!--WRAP EACH DIV TOGETHER -->
                <div  style="display: inline-flex; flex-wrap: wrap; justify-content: space-evenly;">
                    <!-- MAKE THE ITEMS -->
                    @for($i = 0 ; $i < count($group); $i++)
                    @if($group[$i]["subtype"] == "wearable")
                    <!--ITEM BLOCK-->
                    <!--ITEM BLOCK START-->
                        <div onclick="showMenu({{$i}})" class="None filter {{$group[$i]["itemtype"]}}" id="inventorywrap" >
                            <div class="invetorydiv">
                                {{$group[$i]["itemname"]}}
                                <div style="background-color: #77C6FF75; border-style:double;
                                border-color: #314D61; border-radius: 20px; height: 130px; width: 130px; margin-left: auto; margin-right: auto;">
                                    <div style="margin: 10px; position: absolute; background-color: #fff; border-radius: 5px; height: 20px; text-align: center; padding: 2px;">{{$qtylist[$i]}}</div>
                                    
                                    <img  class="item" src="/item/{{$group[$i]["itemid"]}}/icon" width="120;"  aria-describedby="??">
                                </div>
                                <span style="color: black; font-weight: bold;text-transform:capitalize;"> {{$group[$i]["rarity"]}}</span>
                            </div>
                                <div class="hide">  
                                    <b>Description:</b>{{$group[$i]["info"]}}<br>
                                </div>
                                <div class="itemmenu " id="{{$i}}">
                                  
                                    <form method="POST" action="/equip/{{$group[$i]["itemid"]}}">
                                        @csrf
                                        @method('Post')
                                        <select name="ponychoice" style="display: none;">
                                            <option selected>{{$ponys[0]["ponyid"]}}</option>
                                        </select>
                                        <button class="button-ponyprofile" type="submit">Equip</a>
                                    </form>
                               
                                </div>
                            <!--ITEM BLOCK END-->
                            </div><!--END OF INDIVIDUAL ITEM DIV --> 
                    @endif 
                    @endfor
                        
                </div> <!--END OF INVENTORY WRAP -->

        </div>
         <!--END TAB DIV HERE -->
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
             really nothing yet</div>
       <!--END TAB DIV HERE -->
       <div class="tab-pane fade" id="lineage" role="tabpanel" aria-labelledby="lineage-tab">
        really nothing yet
        </div>
      
    </div><!--END OF THE TAB CONTENT SECTION -->
    

</div>

    
<script src="{{asset('js/inventory.js')}}"></script>
@endsection