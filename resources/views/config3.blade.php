<!doctype html>
<html lang="en">

<head>
      <title>@yield('title')</title>
      <!-- Required meta tags -->
      <meta charset="utf-8" />
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="keywords" content="pony, ponies, pet, pets, horse, game, virtual, online, island">

      <!-- Bootstrap CSS v5.2.1 -->
      <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous" />
      <link href="{{asset('css/styles.css')}}" rel="stylesheet">
      <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
      <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">

  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
      @yield('header')
</head>

<body>

      <div class="wrapper container-md">
            <header>
                  <div>
                        <div class="top-nav">
                              <div class="marquee">
                                    <marquee>scrolling messages</marquee>
                              </div>
                              <div class="userinfo">
                                    <span style="letter-spacing: 2px; ">13:00 UTC </span>
                                    @yield('money')
                              </div>

                        </div>
                        <div class="bottom-nav">
                              <a href="{{route('home')}}"><img class="floating logos" src="{{asset('storage/my.png')}}" style="width: 250px; margin-top: -50px"></a>
                              <div class="login3">

                                    @include('navbar')
                              </div>
                              <div class="logout3">
                                    @yield('logout')
                              </div>
                        </div>

                  </div>
            </header>


            <main>


                  <div style="margin-top: 50px;">
                          <!--DISPLAY SUCCESS-->
                        @if(session()->has('success'))
                        <div class="alert alert-success">
                              {{session('success')}}
                        </div>
                        @endif
                        <!--DISPLAY ERRORS-->
                        @if(session()->has('error'))
                        <div class="alert alert-danger">
                        {{session('error')}}
                        @endif
                  </div>
               
                       
                  @yield('opendiv')
                  <div class="main-content">
                        
                        <div class="config config3-large">
                              @yield('config3')

                        </div>
                        
                        
                   
                  </div>

                 

            </main>



            <footer>
                  <!-- place footer here -->
            </footer>


      </div>









      <!-- Bootstrap JavaScript Libraries -->
      <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>

      <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"></script>
</body>

</html>