@extends('layout.app')
@section('title','Listagem de Compositores')
@section('content')
<h1>Listagem de Compositores</h1>
@if(Session::has('mensagem'))
<div class="alert alert-info">
    {{Session::get('mensagem')}}
</div>
@endif

<br />
<a class="btn btn-success" href="{{url('compositores/create')}}">Criar</a>
<br /><br />
<table class="table table-striped">
    @foreach ($compositores as $compositor)
    <tr>
        <td>
            <a href="{{url('compositores/'.$compositor->id)}}">
                {{$compositor->nome}}</a>
        </td> 
    </tr>
    @endforeach
</table>
@endsection
     
           
 

