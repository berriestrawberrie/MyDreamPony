
@extends('config2')
@section('title')Sign Up @endsection


@section('userinfo')

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


@section('config2')

    <div class="main-whole"> 
        <center>

    <img  src="{{asset('storage/concept2.png')}}" style="max-width: 500px; height: 400px;">
   
      @if($errors->any())
      <div class="alert alert-danger">
      <ul >
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
      @endif
    
    <p>
        <form method="POST" action="{{route('register')}}" style="width: 60%;">
          @csrf
          @method('Post')
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="email address">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <label for="name" class="form-label">Username</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="name" name="name">
              <button class="btn btn-outline-secondary" type="button" id="button-addon1">Check</button>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
              <label for="birthday" class="form-label">Birthday</label>
              <input type="date" class="form-control" id="birthday" name="birthday">
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="ToS">
              <label class="form-check-label" for="ToS">Agree to the<a href="">Terms of Service</a></label>
              
              <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="Rules">
              <label class="form-check-label" for="Rules">Agree to the<a href="">Rules</a></label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </p>
  </center>
    </div>

@endsection
