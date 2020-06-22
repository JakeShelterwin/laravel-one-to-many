@extends('layouts.mainLayout')

@section('content')
  <div class="azienda">
      <h1>Azienda</h1>
      <ul>
        <li>
          <a href="{{route("createTask")}}">Aggiungi Task</a>
        </li>
        @if (session("success"))
          <p>{{session("success")}}</p>
        @endif
        @foreach ($tasks as $task)
          <li>
            <p>Tasks:
              <span> {{$task["name"]}}</span> descrizione <span>{{$task["description"]}}</span>  <a href="{{route("showTask",$task["id"] )}}">vedi dettagli <i class="fas fa-info-circle"></i></a> </p>
          </li>
        @endforeach
      </ul>
  </div>
@endsection
