@extends('layouts.mainLayout')

@section('content')
  <div class="azienda">
      <h1>Task <a href="{{route('home')}}"><i class="fas fa-long-arrow-alt-left"></i></a></h1>
      @if (session("success"))
        <p>{{session("success")}}</p>
      @endif
      <ul>
          <li>
            Nome del task
              <span> {{$task["name"]}}</span>
          </li>
          <li>Descrizione: <span>{{$task["description"]}}</span> </li>
          <li>termine ultimio di consegna <span>{{$task["deadline"]}}</span> </li>
          <li>Dipendente incaricato <span>{{$task -> employee -> firstName}} {{$task -> employee -> lastName}}</span> </li>
          <li> <a href="{{route("editTask",$task["id"])}}">Modifica Caratteristiche <i class="fas fa-edit"></i></a> <a href="{{route("destroyTask", $task["id"])}}">Elimina Task <i class="fas fa-times"></i></a> </li>

      </ul>
  </div>
@endsection
