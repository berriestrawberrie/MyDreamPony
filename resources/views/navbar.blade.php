<style>
    ol {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        list-style-type: none;
        justify-content: space-evenly;
        padding-top: 10px;


    }
    ol img{
        width: 70px;
    }
    ol a:hover{
        filter: brightness(130%);

    }
    </style>
<ol >
    <li> <a href="{{route('avatardesigner')}}"><img src="{{asset('storage/mirror.png')}}"></a></li>
    <li> <a href="{{route('inventory')}}"><img src="{{asset('storage/chest.png')}}" title="Inventory"></a></li>
    <li> <a href="{{route('stable')}}"><img src="{{asset('storage/shoe.png')}}" title="My Stables"></a></li>
    <li> <a href="{{route('ponygen')}}"><img src="{{asset('storage/crystalheart.png')}}" title="Pony Generator"></a></li>
    <li style="margin-top: -5px;"><a href="{{route('map')}}"> 
        <div><div><img src="{{asset('storage/map2.png')}}"></div><div style="margin-top: -74px; margin-left: 26px;"><img class="floatingI" src="{{asset('storage/explorable2.png')}}" style="width: 30px;"></div></div></a></li>
</ol>