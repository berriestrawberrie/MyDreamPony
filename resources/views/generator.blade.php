
    <h1>Generator</h1>
    <div style="display: block; justify-content:center; border: 2px solid black;">
            <div id="build" style="display: block;width: 100%; height: 485px;">
                
                <img id="base" src="http://127.0.0.1:8000/storage/users/{{$user["id"]}}_base.png?"style="position: absolute;"">
                <img id="eye" src=" http://127.0.0.1:8000/storage/users/{{$user["id"]}}_eye.png?" style="position: absolute;">
                <img id="hair" src=" http://127.0.0.1:8000/storage/users/{{$user["id"]}}_hair.png?" style="position: absolute;">
                <img id="hairtrait" src=" http://127.0.0.1:8000/storage/users/{{$user["id"]}}_hairtrait.png?" style="position: absolute;">
                <img id="accent" src="http://127.0.0.1:8000/storage/users/{{$user["id"]}}_accent.png?" style="position: absolute;">
                <img id="facetrait" src="http://127.0.0.1:8000/storage/users/{{$user["id"]}}_facetrait.png?" style="position: absolute;">
                <img id="accent2" src="http://127.0.0.1:8000/storage/users/{{$user["id"]}}_accent2.png?" style="position: absolute;">
                <img id="white" src="http://127.0.0.1:8000/storage/users/{{$user["id"]}}_white.png?" style="position: absolute;">
                <img id="shade" src="http://127.0.0.1:8000/storage/users/{{$user["id"]}}_shade.png?" style="position: absolute;">
                <img id="mask" src="http://127.0.0.1:8000/storage/users/{{$user["id"]}}_mask.png?" style="position: absolute;"> 
                <img id="ink" src="http://127.0.0.1:8000/storage/users/{{$user["id"]}}_ink.png?" style="position: absolute;">
            </div>

            <div id="Type">
                <form action="{{ route('gencolor') }}" method="POST" id="pony-form" style="display:flex; flex-direction: wrap; justify-content:space-evenly;">
                    @csrf
                    @method('Post')
                    <fieldset >
                    <h2>Pony Type</h2>
                    <select id="typeName" name="typeName">
                        <option>Unicorn</option>
                        <option>Dragon</option>
                        <option>Avian</option>
                        <option>Kittling</option>
                    </select>
                    <h2>Sex</h2>
                    <select id="sex" name="sex">
                        <option>Female</option>
                        <option>Male</option>
                    </select>
                    <h2>Age</h2>
                    <select id="age" name="age">
                        <option>Adult</option>
                        <option>Baby</option>
                    </select>
                </fieldset>
                <fieldset >
                    <h2>Hair Trait</h2>
                    <select id="hairtrait" name="hairtrait">
                        <option>none</option>
                        <option >streak</option>
                     
                    </select>
                    <h2>Face Trait</h2>
                    <select id="facetrait" name="facetrait">
                        <option>none</option>
                        <option >blaze</option>
                       
                    </select>
                    <h2>Body Trait</h2>
                    <select id="bodytrait" name="bodytrait">
                        <option>none</option>
                        <option>paint</option>
                      
                    </select>
                </fieldset>
                <fieldset >
                    <h2>Eye Color</h2>
                    <input type="color" name="eyeCol" value="#FFFFFF">
                    <h2>Hair Color</h2>
                    <input type="color" name="hairCol" value="#FFFFFF">
                    <h2>Hair Color (2)</h2>
                    <input type="color" name="hairCol2" value="#FFFFFF">
                    <h2>Coat Color</h2>
                    <input type="color" name="baseCol" value="#FFFFFF">
                    <h2>Accent Color</h2>
                    <input type="color" name="accentCol" value="#FFFFFF">
                    <h2>Accent Color (2)</h2>
                    <input type="color" name="accentCol2" value="#FFFFFF">
                </fieldset>
                <button  type="submit" id="genBtn" " >Generate</button>
            </form>
                </div>
                
                
                <form action="{{route('randColor')}}" method="GET" id="rand-form">
                <button type="submit" id="randBtn" style="height: 40px; width: 80%; margin-top: 15px; margin-bottom: 15px;">Randomize</button>
                </form>
           
    
        </div>



    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  
    <script type="text/javascript" src="{{ asset('js/generator.js') }}" ></script>

