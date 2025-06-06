<!DOCTYPE html>
<html lang="en">
<head>
   <!--INCLUDE THE GENERAL HEADER-->
   @include('REDESIGN/header');
   <title>@yield('title')</title>
</head>

<body>
   <!--INCLUDE THE NAVBAR STYLED IN NAVBAR SCSS-->
   @include('REDESIGN/navbar');

   <!--INCLUDE THE USERINFO STYLED IN THE USERINFO SCSS-->
   @include('REDESIGN/userinfo');
    

    <!--STYLED IN STYLES SASS-->
    <div class="success">I am a success! <i class="fa-solid fa-face-smile"></i></div>
    <div class="error">I am a alert! <i class="fa-solid fa-triangle-exclamation"></i></div>

    <!--STYLED IN MAIN SASS-->
    <main>

    <div class="bigsection">
        @yield('bigsection');
       </div>
        
    </main>

<!--INCLUDE THE FOOTER STYLED IN THE FOOTER SCSS-->
@include('REDESIGN/footer');

</body>

</html>