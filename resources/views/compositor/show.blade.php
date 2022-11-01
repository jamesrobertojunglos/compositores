@extends('layout.app')
@section('title','Compositor - {{$compositor->nome}}')
@section('content')
<h1>Compositor - {{$compositor->nome}}</h1>
<ul>
    <li>ID: {{$compositor->id}}</li>
    <li>Nome: {{$compositor->nome}}</li>
    <li>Ano: {{$compositor->ano}}</li>
    <li>Origem: {{$compositor->origem}}</li>
    <li>Resumo: {{$compositor->resumo}}</li>
    <li>Obras: {{$compositor->obras}}</li>
    </ul>
    <a href="{{url('compositores')}}">voltar</a>
@endsection