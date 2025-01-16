<!doctype html>
<html lang="en">
      <head>
            <title>@yield('title')</title>
            <!-- Required meta tags -->
            <meta charset="utf-8" />
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <meta
                  name="viewport"
                  content="width=device-width, initial-scale=1, shrink-to-fit=no"
            />
            <meta name="keywords" content="pony, ponies, pet, pets, horse, game, virtual, online, island">

            <!-- Bootstrap CSS v5.2.1 -->
            <link
                  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
                  rel="stylesheet"
                  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
                  crossorigin="anonymous"
            />
            <link href="{{asset('css/styles.css')}}" rel="stylesheet">
            <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

      </head>

      <body> 
            <div id="background-wrap">
                  <div class="x1">
                      <div class="cloud"></div>
                  </div>
              
                  <div class="x2">
                      <div class="cloud"></div>
                  </div>
              
                  <div class="x3">
                      <div class="cloud"></div>
                  </div>
              
                  <div class="x4">
                      <div class="cloud"></div>
                  </div>
              
                  <div class="x5">
                      <div class="cloud"></div>
                  </div>
              </div>
            <div class="wrapper container-md">
                  <header>
                  <div>
                        <div class="top-nav">
                              <div class="marquee"><marquee>scrolling messages</marquee></div>
                              <div class="userinfo"> 
                                    <span style="letter-spacing: 2px; ">13:00 UTC </span>
                                   @yield('money')
                              </div> 
                                    
                        </div>
                        <div class="bottom-nav">
                              <a href="{{route('home')}}"><img class="floating logos" src="{{asset('storage/my.png')}}" style="width: 250px; margin-top: -50px"></a>
                              <div class="login">
                                    @yield('userinfo')
                              </div>

                              <div class="avatar">
                                     @yield('avatar')
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
                     
                        <div class="main-content">
                              <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item nav-button" role="presentation">
                                      <button class="nav-button nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Welcome</button>
                                    </li>
                                    <li class="nav-item nav-button" role="presentation">
                                      <button class="nav-button nav-link nav-button" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Sign Up!</button>
                                    </li>
                                    <li class="nav-item nav-button" role="presentation">
                                      <button class="nav-button nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                                    </li>
                                  </ul>
                                  <!--CONTENT TABS HERE -->
                                  <div class="tab-content tab-shape" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                          
                                          <div style="display:flex;">
                                                <div class="config config1-large">
                                                      @yield('large')
                                                </div>
                                                <div class="config config1-md">
                        
                                                      @yield('med')
                                                </div>
                                          </div>
                                          <div style="display:flex;">
                                                <div class="config config1-sm">
                                                      @yield('sm')
                                                </div>
                                                <div class="config config1-sm2" name="newborns">
                                                      @yield('sm2')
                                                </div>
                                          </div>
                                        
                                    </div>
                                    <!--END TAB DIV HERE -->
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                          @include('signup')
                                    </div>
                                     <!--END TAB DIV HERE -->
                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
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
                  crossorigin="anonymous"
            ></script>

            <script
                  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
                  integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
                  crossorigin="anonymous"
            ></script>
      </body>
</html>
