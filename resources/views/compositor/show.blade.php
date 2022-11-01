@extends('layout.app')
@section('title','Compositor - {{$compositor->nome}}')
@section('content')
<h1>Compositor - {{$compositor->nome}}</h1>
<ul>
    <li>ID: {{$contato->id}}</li>
    <li>Nome: {{$compositor->nome}}</li>
    <li>Ano: {{$compositor->ano}}</li>
    <li>Origem: {{$compositor->origem}}</li>
    <li>Resumo: {{$compositor->resumo}}</li>
    <li>Obras: {{$compositor->obras}}</li>
    </ul>
    <a href="{{url('compositor')}}">voltar</a>
@endsection