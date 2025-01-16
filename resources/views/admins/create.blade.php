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
</head>

<body>
  <!-- Main content of website -->
  <h1>Welcome Administrator Add a Pony Type!</h1>
  <div>
    @if($errors->any())
    <ul>
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
    @endif
  </div>
  <form method="POST" action="{{route('admin.store')}}">
    @csrf
    @method('Post')
    <div style="display: block; width: 200px;">
      <label>Pony Type: <input type="text" name="typeName" placeholder="Type Name"></label><br>
      <label>Affinity: <select name="affinity">
          <option value="Earth">Earth</option>
          <option value="Water">Water</option>
          <option value="Fire">Fire</option>
          <option value="Air">Air</option>
        </select> </label><br>
      <label>Sex: <select name="sex">
          <option value="female">Female</option>
          <option value="male">Male</option>
        </select></label><br>
      <label>Charm: <input type="number" name="charm" placeholder="0-20"></label><br>
      <label>Intelligence: <input type="number" name="intel" placeholder="0-20"></label><br>
      <label>Strength: <input type="number" name="str" placeholder="0-20"></label><br>
      <label>Health Points: <input type="number" name="hp" placeholder="0-20"></label><br>
      <label>White: <input type="text" name="white" placeholder="image url"></label><br>
      <label>Ink Layer: <input type="text" name="ink" placeholder="image url"></label><br>
      <label>Eye Color: <input type="text" name="eyeCol" placeholder="image url"></label><br>
      <label>Mask: <input type="text" name="mask" placeholder="image url"></label><br>
      <label>Shade Layer: <input type="text" name="shade" placeholder="image url"></label><br>
      <label>Accent Layer: <input type="text" name="accentCol" placeholder="image url"></label><br>
      <label>Accent (2) Layer: <input type="text" name="accentCol2" placeholder="image url"></label><br>
      <label>Base Layer: <input type="text" name="baseCol" placeholder="image url"></label><br>
      <label>Hair Layer: <input type="text" name="hairCol" placeholder="image url"></label><br>
      <label>Leg Marking Sock: <input type="text" name="leg-sock" placeholder="image url"></label><br>
      <label>Date Created: <input type="date" name="created" placeholder="image url"></label><br>
      <input type="submit" value="Create new Pony Type">


    </div>


  </form>

</body>

</html>