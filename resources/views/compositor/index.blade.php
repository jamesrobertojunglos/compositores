@extends('layout.app')
@section('title','Listagem de Compositores')
@section('content')
<h1>Listagem de Compositores</h1>

<ul>
    @foreach ($compositores as $compositor)
    <li>
        <a href="{{url(compositores/'.$compositor->id)}}">
        {{$compositor->nome}}</a>
    </li>
    @endforeach
</ul>
@endsection
     
           
 

