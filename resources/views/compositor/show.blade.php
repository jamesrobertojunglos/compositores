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

    {{Form::open(['route'=> ['compositores.destroy',$compositor->id],'method' => 'DELETE'])}}
    <a href="{{url('compositores/'.$compositor->id.'/edit')}}" class="btn btn-success">Alterar</a>
    {{Form::submit('Excluir',['class'=>'btn btn-danger'])}}
    <a href="{{url('compositores/')}}" class="btn btn-secondary">Voltar</a>
    {{Form::close()}}
@endsection