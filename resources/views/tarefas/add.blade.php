@extends('layouts.admin')


@section('title', 'Adição de tarefas')
    

@section('content')
    <h1> Adicionando tarefas </h1>

    @if (session('warning'))
        @component('components.alert')
            {{ session('warning') }}        
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