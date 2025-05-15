<!DOCTYPE html>
<html lang="en">
<head>
   <!--INCLUDE THE GENERAL HEADER-->
   @include('REDESIGN/header')
   <title>@yield('title')</title>
   @yield('pagecss')
</head>

<body class="">
   <!--INCLUDE THE NAVBAR STYLED IN NAVBAR SCSS-->
   @include('REDESIGN/navbar')
   <!--INCLUDE THE USERINFO STYLED IN THE USERINFO SCSS-->
   @include('REDESIGN/userinfo')

    <!--STYLED IN STYLES SASS-->
     <!--DISPLAY SUCCESS-->
     @if(session()->has('success'))
     <div class="success">{{session('success')}} </div>
     @endif
     <!--DISPLAY ERRORS-->
     @if(session()->has('error'))
     <div class="error">{{session('error')}}</div>
    
     @endif
      

    <!--Input the content-->
    @yield('bodysection')

<!--INCLUDE THE FOOTER STYLED IN THE FOOTER SCSS-->
@include('REDESIGN/footer')

</body>

</html>