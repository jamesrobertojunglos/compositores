@extends('layout.app')
@section('title','Alteração Compositor {{$compositor->nome}}')
@section('content')
<h1>Alteração Compositor {{$compositor->nome}}</h1>
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
{{Form::open(['route' => ['compositores.update',$compositor->id], 'method' => 'PUT',
    'enctype'=>'multipart/form-data'])}}
    {{Form::label('nome', 'Nome')}}
    {{Form::text('nome',$compositor->nome,['class'=>'form-control'
    ,'required', 'placeholder'=>'Nome do Compositor'])}}
    {{Form::label('ano', 'Ano')}}
    {{Form::text('ano',$compositor->ano,['class'=>'form-control'
    ,'required', 'placeholder'=>'Periodo em que o compositor atuou'])}}
    {{Form::label('origem', 'Origem')}}
    {{Form::text('origem',$compositor->origem,['class'=>'form-control'
    ,'required', 'placeholder'=>'Insira a origem do Compositor'])}}
    {{Form::label('resumo', 'Resumo')}}
    {{Form::text('resumo',$compositor->resumo,['class'=>'form-control'
    ,'required', 'placeholder'=>'Insira um resumo sobre o Compositor'])}}
    {{Form::label('obras', 'Obras')}}
    {{Form::text('obras',$compositor->obras,['class'=>'form-control'
    ,'required', 'placeholder'=>'insira as obras do Compositor'])}}
    {{Form::label('foto', 'Foto')}}
    {{Form::file('foto',['class'=>'form-control','id'=>'foto'])}}
    <br />
    {{Form::submit('Salvar',['class'=>'btn btn-success'])}}
    <a href="{{url('compositores')}}" class="btn btn-secondary">Voltar</a>
{{Form::close()}}
    @endsection