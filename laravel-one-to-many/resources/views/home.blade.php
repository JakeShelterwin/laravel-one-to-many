@extends('layouts.mainLayout')

@section('content')
  <div class="azienda">
      <h1>Azienda</h1>
      <h1>Tutti i Tasks</h1>
      <ul>
        <li>
          <a href="{{route("createTask")}}">Aggiungi Task <i class="far fa-plus-square"></i></a>
        </li>
        @if (session("success"))
          <p>{{session("success")}}</p>
        @endif
        @foreach ($tasks as $task)
          <li>
            Task {{$task -> id}} :
              <span> {{$task["name"]}}</span> assegnato all'employee <span>{{$task -> employee -> firstName}} {{$task -> employee -> lastName}}</span>
              <a href="{{route("showTask",$task["id"] )}}">vedi dettagli Task {{$task -> id}} <i class="fas fa-info-circle"></i></a>
<a href="{{route("showEmployee", $task -> employee -> id )}}">vedi dettagli Employee <i class="fas fa-info-circle"></i></a>
          </li>
        @endforeach
      </ul>
      <div class="employees">
      <h1>Tutti i Dipendenti</h1>
      <a href="{{route("createEmployee")}}">Assumi Employee <i class="fas fa-user-plus"></i></a>
        <ul>
          @foreach ($employees as $employee)
            <li> {{$employee -> id}} {{$employee -> firstName}} {{$employee -> lastName}} <a href="{{route("showEmployee", $task -> employee -> id )}}"><i class="fas fa-info-circle"></i></a></li>
          @endforeach
        </ul>
      </div>
  </div>
@endsection
