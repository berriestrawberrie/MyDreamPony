<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Information about website and creator -->
    <meta charset="UTF-8" />
    <!-- Defines the compatibility of version with browser -->
    <meta name="viewport" content="width=device-width, 
                   initial-scale=1.0" />

    <!-- To give information about author or owner -->
    <meta name="description " content="Make your dream pony come true" />
    <!-- to explain about website in few words -->
    <title>My Dream Pony</title>
    <!-- Name of website or content to display -->
    <link href="{{asset('css/content.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/table.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
</head>

<body>
    <!-- Main content of website -->
    <div class="webpage">
        <marquee behavior="scroll" direction="left">Here is some scrolling text... right to left!</marquee>
        <div class="banner">
            <img src="http://127.0.0.1:8000/storage/website5.png" style="border-radius: 20px; width: 1000px;">
        </div>
        <div class="avatar">
            <img src="http://127.0.0.1:8000/storage/doll.png">
        </div>
        <div class="pethead">
            <img src="http://127.0.0.1:8000/storage/UNI.png" style="-webkit-transform: scaleX(-1);
  transform: scaleX(-1); width: 500px">
        </div>

        <nav>
            <ul>
                <li><a href=""><img src="http://127.0.0.1:8000/storage/potion.png" style="rotate:-10deg;"></a></li>
                <li><a href=""><img src="http://127.0.0.1:8000/storage/book.png"></a></li>
                <li><a href=""><img src="http://127.0.0.1:8000/storage/shoe.png" style="rotate: 10deg;"></a></li>
                <li><a href=""><img src="http://127.0.0.1:8000/storage/chest.png" style="rotate: 0deg;"></a></li>
                <li><a href=""><img src="http://127.0.0.1:8000/storage/mirror.png" style="rotate: 0deg;"></a></li>
                <li><a href=""><img src="http://127.0.0.1:8000/storage/scroll.png" style="rotate: 0deg;"></a></li>
            </ul>
        </nav>

        <table>
            <tr>
                <!--SIDE BAR -->
                <!--SIDE BAR -->
                <!--SIDE BAR -->
                <td class="sidebar">
                    <div class="sideinner">
                        <form method="POST" action="{{route('logout')}}">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>


                    </div>
                    <!--END SIDE BAR -->
                    <!--END SIDE BAR -->
                    <!--END SIDE BAR -->
                </td>
                <!--MAIN CONTENT-->
                <!--MAIN CONTENT-->
                <!--MAIN CONTENT-->
                <td CLASS="maincontent">
                    <div class="header">
                        <h1>Welcome:#{{$user->id}}{{$user->name}}</h1>

                        <p>Welcome back we missed you!</p>

                    </div>
                    <div class="headerbody">

                    </div>


                </td>
                <!--END MAIN -->
                <!--END MAIN -->
                <!--END MAIN -->
            </tr>
        </table>




    </div>
    </div>


</body>

</html>