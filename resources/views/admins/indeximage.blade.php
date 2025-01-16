@extends('config2')
@section('title')ADMIN INDEX @endsection

@section('userinfo')
<a href="{{route('generator')}}"><button>Generator</button></a>
<a href="{{route('admin.create')}}" style="width: 190px;"><button>New Pony</button></a>
@endsection

@section('config2')



    @foreach($buildponys as $buildpony)
    <style>
        th{
            text-align: center;
            background-color: rgb(77, 181, 255);
            color: white;
        }
        td{
            font-weight: bold;
            text-align: center;
        }
    </style>
    <table border="1" style="width: 100%;">
        
        <tr>
            <th>Type</th>
            <th>Affinity</th>
            <th>Sex</th>
        </tr>
        <tr>
            <td>{{$buildpony->typeName}}</td>
            <td>{{$buildpony->affinity}}</td>
            <td>{{$buildpony->sex}}</td>
        </tr>
        <tr>
            <td colspan="3" style="height: 485px;">
                <img src="/dbimage/{{$buildpony->id}}/imgbase" style=" position: absolute; margin-top: -260px; margin-left: -250px;">
                <img src="/dbimage/{{$buildpony->id}}/imghair" style=" position: absolute; margin-top: -260px; margin-left: -250px;">
                <img src="/dbimage/{{$buildpony->id}}/imgaccent" style=" position: absolute; margin-top: -260px; margin-left: -250px;">
                <img src="/dbimage/{{$buildpony->id}}/imgaccent2" style=" position: absolute; margin-top: -260px; margin-left: -250px;">
                <img src="/dbimage/{{$buildpony->id}}/imgeye" style=" position: absolute; margin-top: -260px; margin-left: -250px;">
                <img src="/dbimage/{{$buildpony->id}}/imgmask" style=" position: absolute; margin-top: -260px; margin-left: -250px;">
                <img src="/dbimage/{{$buildpony->id}}/imgwhite" style=" position: absolute; margin-top: -260px; margin-left: -250px;">
                <img src="/dbimage/{{$buildpony->id}}/imgshade" style=" position: absolute; margin-top: -260px; margin-left: -250px;">
                <img src="/dbimage/{{$buildpony->id}}/imgink" style=" position: absolute; margin-top: -260px; margin-left: -250px;">
            </td>
        </tr>
        <tr><th colspan="3">Available Markings</th></tr>
        <tr>
            <!-- SPECIAL TRAITS 1 -3 -->
            @for ($i = 1; $i<= 3;$i++)
            <td style="height: 300px;">
                <img src="/trait/{{$buildpony->id}}/{{$i}}"style=" position: absolute; margin-top: -100px; margin-left: -150px;  width: 300px;">
                <img src="/dbimage/{{$buildpony->id}}/imgmask" style=" position: absolute; margin-top: -100px;margin-left: -150px; width: 300px;">
                <img src="/dbimage/{{$buildpony->id}}/imgshade" style=" position: absolute; margin-top: -100px;margin-left: -150px;  width: 300px;">
                <img src="/dbimage/{{$buildpony->id}}/imgink" style=" position: absolute; margin-top: -100px;margin-left: -150px;  width: 300px;">
            </td>
            @endfor
        </tr>
        <tr>
            <!-- SPECIAL TRAITS 4 -->
            @for ($i = 4; $i< 5;$i++)
            <td style="height: 300px;">
                <img src="/trait/{{$buildpony->id}}/{{$i}}"style=" position: absolute; margin-top: -100px; margin-left: -150px;  width: 300px;">
                <img src="/dbimage/{{$buildpony->id}}/imgmask" style=" position: absolute; margin-top: -100px;margin-left: -150px; width: 300px;">
                <img src="/dbimage/{{$buildpony->id}}/imgshade" style=" position: absolute; margin-top: -100px;margin-left: -150px;  width: 300px;">
                <img src="/dbimage/{{$buildpony->id}}/imgink" style=" position: absolute; margin-top: -100px;margin-left: -150px;  width: 300px;">
            </td>
            @endfor
        </tr>



    </table>
    
    <div style="width: 100%; height: 70px;">
    </div>

    @endforeach



@endsection