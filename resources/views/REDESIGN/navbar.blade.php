 <!--STYLED IN NAV SASS-->
 <nav class="relative flex justify-center items-start w-full z-99 ">
    <div class="absolute top-2 scale-100 ">
        <div class="weather absolute left-25 top-12 h-[108px] w-[108px]">

        </div>
        <img  src="{{asset('storage/images/circle2-sm.png')}}">
        
    </div>
    <div class="goldbanner ">
        <div class="alerts absolute top-2 w-full flex justify-between">
            <a href="#"><img class="sm:w-[80px]  w-[50px]" src="{{asset('storage/images/notification.png')}}"></a>
            <a href="#"><img class="sm:w-[80px] mr-5 w-[50px]" src="{{asset('storage/images/mail.png')}}"></a>
        </div>
        <div class="bannerlight"></div>
        <img src="{{asset('storage/images/shine.svg')}}">

    </div>
</nav>