@extends('layout.app')
@section('title','Listagem de Compositores')
@section('content')
<h1>Listagem de Compositores</h1>
@if(Session::has('mensagem'))
<div class="alert alert-info">
    {{Session::get('mensagem')}}
</div>
@endif

{{Form::open(['url'=>'compositores/buscar','method'=>'GET'])}}
<div class="row">
    <div class="col-sm-3">
       <a class="btn btn-success" href="{{url('compositores/create')}}">Criar</a>
    </div>
    <div class="col-sm-9">
       <div class="input-group ml-5">
           @if($busca !== null)
               &nbsp;<a class="btn btn-info" href="{{url('compositores/')}}">Todos</a>&nbsp;
           @endif
           {{Form::text('busca',$busca,['class'=>'form-control','required','placeholder'=>'buscar'])}}
           &nbsp;  
           <span class="input-group-btn">
               {{Form::submit('Buscar',['class'=>'btn btn-secondary'])}}
           </span>
        </div>
    </div>
</div>
{{Form::close()}}
<br />
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
{{$compositores->links() }}
@endsection