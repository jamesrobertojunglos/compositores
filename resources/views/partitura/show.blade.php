@extends('layout.app')
@section('title','Partitura - {{$partitura->compositor}}')
@section('content')
<div class="card w-100">
    @php
        $nomeimagem = "";
        if(file_exists("./img/partituras/".md5($partitura->id).".jpg")) {
            $nomeimagem = "./img/partituras/".md5($partitura->id).".jpg";
        } elseif (file_exists("./img/partituras/".md5($partitura->id)."png")) {
            $nomeimagem = "./img/partituras/".md5($partitura->id).".png";
        } elseif 
        (file_exists("./img/compositores/".md5($partitura->id).".gif")) {
            $nomeimagem = "./img/partituras/".md5($partitura->id).".gif";
        } elseif 
        (file_exists("./img/partituras/".md5($partitura->id).".webp")) {
            $nomeimagem = "./img/partituras/".md5($partitura->id).".webp";
        } elseif 
        (file_exists("./img/partituras/".md5($partitura->id).".jpeg")) {
            $nomeimagem = "./img/partituras/".md5($partitura->id).".jpeg";
        } else {
            $nomeimagem = "./img/partituras/semfoto.webp";
        }
        //echo $nomeimagem;
@endphp

    {{Html::image(asset($nomeimagem),'Foto de '.$partitura->compositor,["class"=>"img-thumbnail"])}} 

    <div class="card-header">
        <h1>Partitura - {{$partitura->compositor}}</h1>
    </div>
    <div class="card-body">
        <h3 class="card-title">ID: {{$partitura->id}}</h3>
        Compositor: {{$partitura->compositor}}<br/>
        Partitura: {{$partitura->partitura}}<br/>
    </div>
        <div class="card-footer">
            {{Form::open(['route'=> ['partituras.destroy',$compositor->id],'method' => 'DELETE'])}}
            @if ($nomeimagem !== "./img/partituras/semfoto.webp")
                {{Form::hidden('foto',$nomeimagem)}}
            @endif
            <a href="{{url('partituras/'.$partitura->id.'/edit')}}" class="btn btn-success">Alterar</a>
            {{Form::submit('Excluir',['class'=>'btn btn-danger','onclick'=>'return confirm ("Confirma a exclusão?")'])}}
            <a href="{{url('partitura/')}}"
            class="btn btn-secondary">Voltar</a>
            {{Form::close()}}
        </div>
    </div>
@endsection