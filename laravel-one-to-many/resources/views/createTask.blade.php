@extends('layouts.mainLayout')

@section('content')
  <div class="azienda">
      <h1>Aggiungi un Task <a href="{{route('home')}}"><i class="fas fa-long-arrow-alt-left"></i></a></h1>
      @if ($errors->any())
        @foreach ($errors->all() as $error)
          <p>{{$error}}</p>
        @endforeach
      @endif
      <form class="" action="{{route('storeTask')}}" method="post">
        @csrf
        @method("POST")
        <label for="name">Nome task</label>
        <input type="text" name="name" value="{{old("name")}}">
        <br>
        <label for="description">Descrizione task</label>
        <input type="text" name="description" value="{{old("description")}}">
        <br>
        <label for="deadline">Scadenza</label>
        <input type="text" name="deadline" value="{{old("deadline")}}">
        <br>
        <label for="employee_id">Employee</label>
        <select name="employee_id">
          @foreach ($employees as $employee)
            <option value="{{$employee -> id}}">
              {{$employee -> firstName}} {{$employee -> lastName}}
            </option>
          @endforeach
        </select>
        <button type="submit" name="submit">Submit</button>
      </form>
  </div>
@endsection
