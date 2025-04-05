 <!--STYLED IN USERINFO SASS-->
    <div class="userinfo">
        <div class="userleft">
        </div>
        <div class="userright">
            <form action="{{route('logout')}}" method="POST">
                @csrf
                @method('POST')
                <button type="submit" class="button-8">Logout</button>
            </form>
            <div class="usermoney"><img src="{{asset('storage/images/coiny2.png')}}">999,999,999,999</div>
            <div class="usercrystal"><img src="{{asset('storage/images/crystalheart2.png')}}"> 999,999</div>
        </div>
    </div>