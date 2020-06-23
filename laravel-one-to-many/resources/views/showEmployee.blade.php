@extends('layouts.mainLayout')

@section('content')
  <div class="azienda">
      <h1>Employee <a href="{{route('home')}}"><i class="fas fa-long-arrow-alt-left"></i></a></h1>
      @if (session("success"))
        <p>{{session("success")}}</p>
      @endif
      <ul>
          <li>
            Nome employee:
              <span> {{$employee["firstName"]}} {{$employee["lastName"]}}</span>
          </li>
          <li>data di nascita: <span>{{$employee["DateOfBirth"]}}</span> </li>
          <li>
            Locations Dipendente
            <span>
              @foreach ($employee -> locations as $location)
                <br>
                {{$location -> state}}
                {{$location -> city}}
                {{$location -> street}}
                <br>
              @endforeach

            </span>



          </li>
          <li> <a href="{{route("editEmployee",$employee["id"])}}">Modifica Informazioni <i class="fas fa-edit"></i></a> <a href="{{route("destroyEmployee", $employee["id"])}}">Licenzia Employee <i class="fas fa-times"></i></a> </li>

      </ul>
  </div>
@endsection
