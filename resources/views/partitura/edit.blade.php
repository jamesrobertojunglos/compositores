@extends('layout.app')
@section('title','Alteração Partitura {{$partitura->compositor}}')
@section('content')
<h1>Alteração Compositor {{$partitura->compositor}}</h1>
@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>
                {{$error}}
            </li>
            @endforeach
        </ul>
    </div>
@endif
@if(Session::has('mensagem'))
    <div class="alert alert-success">
        {{Session::get('mensagem')}}
    </div>
@endif
<br \>
{{Form::open(['route' => ['partituras.update',$partitura->id], 'method' => 'PUT',
    'enctype'=>'multipart/form-data'])}}
    {{Form::label('compositor', 'Compositor')}}
    {{Form::text('compositor',$partitura->compositor,['class'=>'form-control'
    ,'required', 'placeholder'=>'Nome do Compositor'])}}
    {{Form::label('partitura', 'Partitura')}}
    {{Form::text('partitura',$partitura->partitura,['class'=>'form-control'
    ,'required', 'placeholder'=>'Insira a partitura'])}}
    {{Form::label('foto', 'Foto')}}
    {{Form::file('foto',['class'=>'form-control','id'=>'foto'])}}
    <br />
    {{Form::submit('Salvar',['class'=>'btn btn-success'])}}
    <a href="{{url('partituras')}}" class="btn btn-secondary">Voltar</a>
{{Form::close()}}
    @endsection