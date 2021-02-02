@extends('layouts.admin')


@section('title', 'Adição de tarefas')
    

@section('content')
    <h1> Adicionando tarefas </h1>

    <form action="" method="post">
        @csrf

        <label>
            Titulo: <br>
            <input type="text" name="title" id="">
        </label>

        <input type="submit" value="Adicionar">


    </form>

@endsection