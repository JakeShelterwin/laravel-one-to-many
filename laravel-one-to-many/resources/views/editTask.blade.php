@extends('layouts.mainLayout')

@section('content')
  <div class="azienda">
      <h1>Task <a href="{{route('showTask', $task["id"])}}"><i class="fas fa-long-arrow-alt-left"></i></a></h1>
      @if ($errors->any())
        @foreach ($errors->all() as $error)
          <p>{{$error}}</p>
        @endforeach
      @endif
      <form class="" action="{{route('updateTask', $task['id'])}}" method="post">
        @csrf
        @method("POST")
        <label for="name">Nome</label>
        <input type="text" name="name" value="{{old("name", $task["name"])}}">
        <br>
        <label for="description">Descrizione</label>
        <input type="text" name="description" value="{{old("description", $task["description"])}}">
        <br>
        <label for="deadline">Scadenza (YY-MM-DD)</label>
        <input type="text" name="deadline" value="{{old("deadline", $task["deadline"])}}">
        <br>
        <label for="employee_id">Employee</label>
        <select name="employee_id">
          @foreach ($employees as $employee)
            <option value="{{$employee -> id}}"
              @if ($employee -> id === $task -> employee_id)
                selected
              @endif >
              {{$employee -> firstName}} {{$employee -> lastName}}
            </option>
          @endforeach
        </select>
        <button type="submit" name="submit">Submit</button>
      </form>
  </div>
@endsection
