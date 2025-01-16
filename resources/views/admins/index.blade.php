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
      <h1>Welcome Administration!</h1>
      @if(session()->has('success'))
      <div>
            {{session('success')}}
      </div>
      @endif

      <a href="{{route('admin.create')}}"><button>Create A Pony Type</button></a>
      <a href="{{route('generator')}}"><button>Custom Pony</button></a>
      <a href="{{route('admin.color')}}"><button>Color Pony</button></a>
      <a href="{{route('admin.index')}}"><button>Image Index</button></a>
      <a href="{{route('signup')}}"><button style="width: 90px;">Sign Up</button></a>

      <table border="1"">
            <tr>
                  <th>Type</th>
                  <th>Affinity</th>
                  <th>Sex</th>
                  <th>Layers</th>
                  <th>ink</th>
                  <th>Java</th>
            </tr>

            @foreach($buildponys as $buildpony)
            
            <tr>
                  <td>{{$buildpony->typeName}}</td>
                  <td>{{$buildpony->affinity}}</td>
                  <td>{{$buildpony->sex}}</td>
                  <td>
                        <div style=" display: none;">
            <img class=" img{{$buildpony->typeName}}" src="{{$buildpony->baseCol}}">
            <img class="img{{$buildpony->typeName}}" src="{{$buildpony->hairCol}}">
            <img class="img{{$buildpony->typeName}}" src="{{$buildpony->accentCol}}">
            <img class="img{{$buildpony->typeName}}" src="{{$buildpony->accentCol2}}">
            <img class="img{{$buildpony->typeName}}" src="{{$buildpony->eyeCol}}">
            <img class="img{{$buildpony->typeName}}" src="{{$buildpony->mask}}">
            <img class="img{{$buildpony->typeName}}" src="{{$buildpony->white}}">
            <img class="img{{$buildpony->typeName}}" src="{{$buildpony->shade}}">
            <img class="img{{$buildpony->typeName}}" src="{{$buildpony->ink}}">
            </div>
            </td>
            <td>
                  <canvas id="myCanvas{{$buildpony->typeName}}" width="600px" height="600px">
                  </canvas>


            </td>
            <td>
                  <div id="java"> {{$buildpony->typeName}}</div>
            </td>
            </tr>

            @endforeach

      </table>
</body>

<script src="{{ asset('js/script.js') }}"></script>

</html>