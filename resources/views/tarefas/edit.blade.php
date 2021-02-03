@extends('layouts.admin')

@section('title', 'Editando tarefas')


@section('content')
    <h1>Editando tarefas</h1>

    @if (session('warning'))
        @component('components.alert')
            {{ session('warning') }}        
        @endcomponent        
    @endif
    

    <form action="" method="post">
        @csrf

        <label>
            Titulo: <br>
            <input type="text" name="title" value="{{ $data->titulo }}" autocomplete="off">
        </label>

        <input type="submit" value="Salvar">
    </form>


@endsection