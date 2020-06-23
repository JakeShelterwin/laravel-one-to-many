@extends('layouts.mainLayout')

@section('content')
  <div class="azienda">
      <h1>Employee <a href="{{route('showEmployee', $employee["id"])}}"><i class="fas fa-long-arrow-alt-left"></i></a></h1>
      @if ($errors->any())
        @foreach ($errors->all() as $error)
          <p>{{$error}}</p>
        @endforeach
      @endif
      <form class="" action="{{route('updateEmployee', $employee['id'])}}" method="post">
        @csrf
        @method("POST")
        <label for="firstName">Nome</label>
        <input type="text" name="firstName" value="{{old("firstName", $employee["firstName"])}}">
        <br>
        <label for="lastName">Cognome</label>
        <input type="text" name="lastName" value="{{old("lastName", $employee["lastName"])}}">
        <br>
        <label for="DateOfBirth">Data di nascita (Y-M-D)</label>
        <input type="text" name="DateOfBirth" value="{{old("DateOfBirth", $employee["DateOfBirth"])}}">
        <br>
        <label for="locations[]">Locations</label><br>
          @foreach ($locations as $location)
            <input type="checkbox" name="locations[]" value="{{$location -> id}}"
              @foreach ($employee -> locations as $employeeLocation)
                @if ($employeeLocation -> id  == $location -> id)
                  checked
                @endif
              @endforeach
            >
            {{$location -> state}} {{$location -> city}}{{$location -> street }} <br>
          @endforeach
        <button type="submit" name="submit">Submit</button>
      </form>
  </div>
@endsection
