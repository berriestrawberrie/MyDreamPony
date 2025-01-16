
@extends('master')
@section('title')My Dream Pony @endsection

@section('userinfo')

<form method="POST" action="{{route('login')}}" style="width: 420px; padding-top: 10px;">
    @csrf
    @method('Post')
    <fieldset>
          <legend>Username</legend>
          <input type="text" name="name" placeholder="username" class="userholder">
    </fieldset>
    <fieldset>
          <legend>Password</legend>
          <input type="password" name="password" placeholder="password" class="userholder">
    </fieldset>
    <button class="button-8" type="submit" style="margin-top: 18px;">Login</button>
</form>
<form method="GET" action="{{route('signup')}}" style="margin-left: -40px;">
<button class="button-8" type="submit">Sign Up</button></a>
</form>


@endsection

@section('avatar')
    <img src="{{asset('storage/avatarconcept.png')}}">
    <img src="{{asset('storage/rainbow.png')}}" style="margin-top: -180px">
@endsection
@section('alert')
    @if(session()->has('success'))
    <div class="alert">
        <div class="alertinner"> {{session('success')}}</div>
    </div>
    @endif

     @if($errors->any())
      <div class="alert alert-danger">
      {{session('error')}}
      @endif
@endsection

@section('large')
<div class="map">
    <h2>Welcome</h2>
    <img src="{{asset('storage/map.png')}}">
</div>

@endsection

@section('med')
<div class="news">
    <h2>News</h2>
    <table>
          <tr><th>News1</th></tr>
          <tr><td>News1 content News1 content News1 content News1 content</td></tr>
          <tr><th>News2</th></tr>
          <tr><td>News2 content News1 content News2 content News1 content</td></tr>
          <tr><th>News3</th></tr>
          <tr><td>News3 content News1 content News2 content News1 content</td></tr>
    </table>
</div>

@endsection

@section('sm')
<div class="spotlight">
    <h2>Beauty 1st</h2>
    <img src="{{asset('storage/concept2.png')}}">
</div>

@endsection

@section('sm2')
<h2>Site Stats</h2>
<table>
    <tr>
        <th># Users </th>
        <th># Ponies </th>
        <th># Forums </th>
  
    </tr>
    <tr><td>0 Users</td>
        <td>0 Ponies</td>
        <td>0 Forums</td>
    </tr>
</table>

What else here???


@endsection


