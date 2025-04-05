@extends('REDESIGN/redesign')
@section('title')My Stable Name @endsection


@section('bodysection')
<div class="ponyprofile">

    <div class="ponyprofile__ponybanner" style="background-image: url('{{asset('storage/images/banner.png')}}');">
       <h3>IamTheOneTrueKing</h3>
    </div>

    <div class="ponyprofile__ponyimage">
        <img src="{{asset('storage/images/kitt-male.png')}}">
        <div class="equiped">
            <div class="equiped__item">
                <div class="actual"><img src="{{asset('storage/images/bowicon.png')}}"></div>
                <div class="cover"></div>
                <div class="desc">
                    <p><b>Item Name</b></p>
                    <p>Desc: I am an item description hear me rawr
                        something else??</p>
                    <p>Slots: Tail</p>
                    <div class="tags">
                        <span>tag 1</span><span>tag 2</span>
                        <span>tag 3</span>
                    </div>
                </div>
            </div>
            <div class="equiped__item">
                <div class="actual"><img src="{{asset('storage/images/bowicon.png')}}"></div>
                <div class="cover"></div>
                <div class="desc">
                    <p><b>Item Name</b></p>
                    <p>Desc: I am an item description hear me rawr
                        something else??</p>
                    <p>Slots: Tail</p>
                    <div class="tags">
                        <span>tag 1</span><span>tag 2</span>
                        <span>tag 3</span>
                    </div>
                </div>
            </div>
            
            
            
        </div>
    </div>

    <div class="ponyprofile__nextpony">
        <img class="nextleft" src="{{asset('storage/images/arrow.png')}}">
        <img class="nextright" src="{{asset('storage/images/arrow.png')}}">
    </div>
    
    <div class="ponyprofile__ponystats">
        <h5>HP: 0 /100</h5>
        <div class="hpbar" style="background-image: url('{{asset('storage/images/hpbar.png')}}');">
            <div class="hpbarlength"></div>
        </div>
        <h5>Hunger: 0 /100</h5>
        <div class="hungerbar" style="background-image: url('{{asset('storage/images/greenapple.png')}}');">
            <div class="hungerbarlength"></div>
        </div>
        <hr>
        <table id="ponyhex">
            <tr>
                <td class="hextype">Coat:</td>
                <td class="hexcode"><div class="hexbox coat"></div> #FFFFFF</td>
                <td></td>
            </tr>
            <tr>
                <td class="hextype">Eye:</td>
                <td class="hexcode"><div class="hexbox eye"></div>#FFFFFF</td>
                <td></td>
            </tr>
            <tr>
                <td class="hextype">Accent:</td>
                <td class="hexcode"><div class="hexbox accent1"></div>#FFFFFF</td>
                <td class="hexcode"><div class="hexbox accent2"></div> #000000</td>
            </tr>
            <tr>
                <td class="hextype">Hair:</td>
                <td class="hexcode"><div class="hexbox hair1"></div> #FFFFFF</td>
                <td class="hexcode"><div class="hexbox hair2"></div> #000000</td>
            </tr>

        </table>
        <hr>
        <div class="expstats">
           <table>
            <tr><td><h5>Level</h5></td></tr>
            <tr><td><h5>765</h5></td></tr>
           </table>
           <div class="expbar" style="background-image: url('{{asset('storage/images/expbar.png')}}');">
            <div class="expbarlength"></div>
           </div>
        </div>
        <hr>
        <div class="maxed">
    
            <img src="{{asset('storage/images/red-heart.png')}}">
            <img src="{{asset('storage/images/orange-heart.png')}}">
            <img src="{{asset('storage/images/green-heart.png')}}">
            <img src="{{asset('storage/images/cyan-heart.png')}}">
            <img src="{{asset('storage/images/purple-heart.png')}}">

        </div>
        <hr>
        <table class="statpoints">
            <tr>
                <th>Intelligence</th>
                <th>Charm</th>
                <th>Strength</th>
            </tr>
            <tr>
                <td>500</td>
                <td>500</td>
                <td>500</td>
            </tr>
        </table>
        <button class="btn-gold stat-btn">Lineage</button>
    </div>
</div>
<div class="ponystatsdetail">
   <div class="ponystatsdetail__links">
    <button class="btn-gold btn-sm">Profile</button>
    <button class="btn-gold">Items</button>
    <button class="btn-gold">Contests</button>
    <button class="btn-gold">Lineage</button>
   </div>
   <div class="ponystatsdetail__container">
    <div class="ponycontainertop"><img src="{{asset('storage/images/shine.svg')}}"></div>
    Pony Details here!
   </div>
</div>

@endsection