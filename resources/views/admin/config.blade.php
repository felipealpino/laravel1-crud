@extends('layouts\admin')  {{-- HERDANDO LAYOUT --}}
@section('title', 'Configurações')  {{-- DEFININDO TITULO --}}


@section('content') {{-- DEFININDO CONTENT --}}
    <h1>Configurações</h1>

    Meu nome é {{$nome}} e eu tenho {{$idade}} anos <br>
    Versão {{$versao}} <br>  {{-- VARIAVEL GLOBAL SETADA EM app/providers/AppServiceProvicer.php → public function boot  --}}

    <br>

    @component('components.alert')
        Conteudo de alerta !   
    @endcomponent

    <br>

    <form action="" method="POST">
        @csrf

        Nome: <br>
        <input type="text" name="nome" id=""> <br> <br>

        Idade: <br>
        <input type="text" name="idade" id=""> <br> <br>

        Cidade   : <br>
        <input type="text" name="cidade" id=""> <br> <br>

        <input type="submit" value="Enviar">
    </form>

@endsection


