@extends('layouts.mainLayout')

@section('content')
  <div class="azienda">
      <h1>Inserici dati Employee <a href="{{route('home')}}"><i class="fas fa-long-arrow-alt-left"></i></a></h1>
      @if ($errors->any())
        @foreach ($errors->all() as $error)
          <p>{{$error}}</p>
        @endforeach
      @endif
      <form class="" action="{{route('storeEmployee')}}" method="post">
        @csrf
        @method("POST")
        <label for="firstName">Nome</label>
        <input type="text" name="firstName" value="{{old("firstName")}}">
        <br>
        <label for="lastName">Cognome</label>
        <input type="text" name="lastName" value="{{old("lastName")}}">
        <br>
        <label for="DateOfBirth">Data di nascita (YY-MM-DD)</label>
        <input type="text" name="DateOfBirth" value="{{old("DateOfBirth")}}">
        <br>
        <label for="role">Mansione</label>
        <input type="text" name="role" value="{{old("role")}}">
        <br>
        <label for="locations[]">Locations</label><br>
          @foreach ($locations as $location)
            <input type="checkbox" name="locations[]" value="{{$location -> id}}">
            {{$location -> state}} {{$location -> city}}{{$location -> street }} <br>
          @endforeach
        <button type="submit" name="submit">Salva</button>
      </form>
  </div>
@endsection
