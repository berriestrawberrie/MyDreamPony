@extends('REDESIGN/redesign')
@section('title')My Dream Pony @endsection


@section('bodysection')


<p>Welcome!</p>
<a href="{{route('resignup')}}"><button class="btn-gold">Sign Up!</button></a>


<form method="POST" action="{{route('login')}}">
    @csrf
    @method('Post')
    <fieldset>
          <legend>Username</legend>
          <input type="text" name="name" placeholder="username" class="userholder">
    </fieldset>
    <fieldset>
          <legend>Password</legend>
          <input type="text" name="password" placeholder="password" class="userholder">
    </fieldset>
    <button type="submit" >Login</button>
</form>

@endsection