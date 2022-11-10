@extends('layout.app')
@section('title','Compositor - {{$compositor->nome}}')
@section('content')
<div class="card w-100">
    @php
        $nomeimagem = "";
        if(file_exists("./img/compositores".md5($compositor->id).".jpg")) {
            $nomeimagem = "./img/compositores/".md5($compositor->id).".jpg";
        } elseif (file_exists("./img/compositores".md5($compositor->id)."png")) {
            $nomeimagem = "./img/compositores/".md5($compositor->id).".png";
        } elseif 
        (file_exists("./img/compositores".md5($compositor->id).".gif")) {
            $nomeimagem = "./img/compositores/".md5($compositor->id).".gif";
        } elseif 
        (file_exists("./img/compositores".md5($compositor->id).".webp")) {
            $nomeimagem = "./img/compositores/".md5($compositor->id).".webp";
        } elseif 
        (file_exists("./img/compositores".md5($compositor->id).".jpeg")) {
            $nomeimagem = "./img/compositores/".md5($compositor->id).".jpeg";
        } else {
            $nomeimagem = "./img/compositores/semfoto.webp";
        }
        //echo $nomeimagem;
@endphp

    {{Html::image(asset($nomeimagem),'Foto de '.$compositor->nome,["class"=>"img-thumbnail"])}} 

    <div class="card-header">
        <h1>Compositor - {{$compositor->nome}}</h1>
    </div>
    <div class="card-body">
        <h3 class="card-title">ID: {{$compositor->id}}</h3>
        Nome: {{$compositor->nome}}<br/>
        Ano: {{$compositor->ano}}<br/>
        Origem: {{$compositor->origem}}<br/>
        Resumo: {{$compositor->resumo}}<br/>
        Obras: {{$compositor->obras}}<br/>
    </div>
        <div class="card-footer">
            {{Form::open(['route'=> ['compositores.destroy',$compositor->id],'method' => 'DELETE'])}}
            @if (@nomeimagem !== "./img/compositores/semfoto.webp")
                {{Form::hidden('foto',$nomeimagem)}}
            @endif
            <a href="{{url('compositores/'.$compositor->id.'/edit')}}" class="btn btn-success">Alterar</a>
            {{Form::submit('Excluir',['class'=>'btn btn-danger','onclick'=>'return confirm ("Confirma a exclusão?")'])}}
            <a href="{{url('compositores/')}}"
            class="btn btn-secondary">Voltar</a>
            {{Form::close()}}
        </div>
    </div>
@endsection