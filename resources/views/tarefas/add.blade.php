@extends('layouts.admin')


@section('title', 'Adição de tarefas')
    

@section('content')
    <h1> Adicionando tarefas </h1>

    @if ($errors->any() )
        @component('components.alert')
            @foreach ($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        @endcomponent        
    @endif


    <form action="" method="post">
        @csrf

        <label>
            Titulo: <br>
            <input type="text" name="title" id="" autocomplete="off">
        </label>

        <input type="submit" value="Adicionar">


    </form>

@endsection