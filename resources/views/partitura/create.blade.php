@extends('layout.app')
@section('title','Inserir Partitura')
@section('content')
<h1>Inserir Compositor</h1>
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
<br />
{{Form::open(['route' => 'partituras.store', 'method' => 'POST','enctype'=>'multipart/form-data'])}}
{{Form::label('compositor', 'Compositor')}}
{{Form::text('compositor','',['class'=>'form-control','required',
'placeholder'=>'Nome do Compositor'])}}
{{Form::label('partitura', 'Partitura')}}
{{Form::text('partitura','',['class'=>'form-control','required',
'placeholder'=>'Insira a partitura'])}}
{{Form::label('foto', 'Foto')}}
{{Form::file('foto',['class'=>'form-control','id'=>'foto'])}}
<br />
{{Form::submit('Salvar',['class'=>'btn btn-success'])}}
{!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)', 
'class'=>'btn btn-secundary'])!!}
{{Form::close()}}
@endsection