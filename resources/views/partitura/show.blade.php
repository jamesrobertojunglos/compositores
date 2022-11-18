@extends('layout.app')
@section('title','Partitura - {{$partidura->compositor}}')
@section('content')
<div class="card w-100">
    @php
        $nomeimagem = "";
        if(file_exists("./img/partituras/".md5($partidura->id).".jpg")) {
            $nomeimagem = "./img/partituras/".md5($partidura->id).".jpg";
        } elseif (file_exists("./img/partituras/".md5($partidura->id)."png")) {
            $nomeimagem = "./img/partituras/".md5($partidura->id).".png";
        } elseif 
        (file_exists("./img/partituras/".md5($partidura->id).".gif")) {
            $nomeimagem = "./img/partituras/".md5($partidura->id).".gif";
        } elseif 
        (file_exists("./img/partituras/".md5($partidura->id).".webp")) {
            $nomeimagem = "./img/partituras/".md5($partidura->id).".webp";
        } elseif 
        (file_exists("./img/partituras/".md5($partidura->id).".jpeg")) {
            $nomeimagem = "./img/partituras/".md5($partidura->id).".jpeg";
        } else {
            $nomeimagem = "./img/partituras/semfoto.webp";
        }
        //echo $nomeimagem;
@endphp

    {{Html::image(asset($nomeimagem),'Foto de '.$partidura->compositor,["class"=>"img-thumbnail"])}} 

    <div class="card-header">
        <h1>Partitura - {{$partidura->compositor}}</h1>
    </div>
    <div class="card-body">
        <h3 class="card-title">ID: {{$partidura->id}}</h3>
        Compositor: {{$partidura->compositor}}<br/>
        Partituras: {{$partidura->partituras}}<br/>
    </div>
        <div class="card-footer">
            {{Form::open(['route'=> ['partituras.destroy',$partidura->id],'method' => 'DELETE'])}}
            @if ($nomeimagem !== "./img/partituras/semfoto.webp")
                {{Form::hidden('foto',$nomeimagem)}}
            @endif
            <a href="{{url('partituras/'.$partidura->id.'/edit')}}" class="btn btn-success">Alterar</a>
            {{Form::submit('Excluir',['class'=>'btn btn-danger','onclick'=>'return confirm ("Confirma a exclusão?")'])}}
            <a href="{{url('partituras/')}}"
            class="btn btn-secondary">Voltar</a>
            {{Form::close()}}
        </div>
    </div>
@endsection