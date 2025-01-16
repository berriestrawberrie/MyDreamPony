<div id="ponygenetable" style="width: 100%;">
    <h3>Special Traits</h3>
    <table>
        <tr>
            @for ($i = 0; $i < count($shown); $i++)
           @if($shown[$i]!="none")
            <td><center><span style="letter-spacing: 2px; ">{{$shown[$i]}}</span></center><br><img src="/trait/icon/{{$shown[$i]}}"  title="{{$shown[$i]}}"></td>
            @endif
           @endfor
        </tr>
    </table>
        <h3>Carried Traits</h3>
    <table>
        <tr>
           @for ($i = 0; $i < count($carry); $i++)
           @if($carry[$i])<td><button class="genebutton">{{$carry[$i]}}</button></td>@endif
           @endfor
        </tr>
       </table>
  </div>

