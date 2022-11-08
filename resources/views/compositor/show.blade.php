@extends('layout.app')
@section('title','Compositor - {{$compositor->nome}}')
@section('content')
<div class="card">
    <div class="card-header">
    <h1>Compositor - {{$compositor->nome}}</h1>
    </div>
    <div class="card-body">
        <h3 class="card-title">ID: {{$compositor->id}}</h3>
        <p class="text"><br/>
        Nome: {{$compositor->nome}}<br/>
        Ano: {{$compositor->ano}}<br/>
        Origem: {{$compositor->origem}}<br/>
        Resumo: {{$compositor->resumo}}<br/>
        Obras: {{$compositor->obras}}<br/>
</div>
<div class="card-footer">
    {{Form::open(['route'=> ['compositores.destroy',$compositor->id],'method' => 'DELETE'])}}
    <a href="{{url('compositores/'.$compositor->id.'/edit')}}" class="btn btn-success">Alterar</a>
    {{Form::submit('Excluir',['class'=>'btn btn-danger','onclick'=>'return confirm("Confima a exclusão?")'])}}
    <a href="{{url('compositores/')}}" class="btn btn-secondary">Voltar</a>
    {{Form::close()}}
</div>
</div>
@endsection