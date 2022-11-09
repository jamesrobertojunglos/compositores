@extends('layout.app')
@section('title','Inserir Compositor')
@section('content')
<h1>Inserir Compositor</h1>
@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>
                {{error}}
            </li>
            @endforeach
        </ul>
    </div>
@endif
<br />
{{Form::open(['route' => 'compositores.store', 'method' => 'POST'])}}
{{Form::label('nome', 'Nome')}}
{{Form::text('nome','',['class'=>'form-control','required',
'placeholder'=>'Nome do Compositor'])}}
{{Form::label('ano', 'Ano')}}
{{Form::text('ano','',['class'=>'form-control','required',
'placeholder'=>'Ano de atuação'])}}
{{Form::label('origem', 'Origem')}}
{{Form::text('origem','',['class'=>'form-control','required',
'placeholder'=>'Origem do Compositor'])}}
{{Form::label('resumo', 'Resumo')}}
{{Form::text('resumo','',['class'=>'form-control','required',
'placeholder'=>'Insira um resumo'])}}
{{Form::label('obras', 'Obras')}}
{{Form::text('obras','',['class'=>'form-control','required',
'placeholder'=>'Obras do Compositor'])}}
<br />
{{Form::submit('Salvar',['class'=>'btn btn-success'])}}
{!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)', 
'class'=>'btn btn-secundary'])!!}
{{Form::close()}}
@endsection