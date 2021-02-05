@extends('layouts.admin')

@section('title', 'Editando tarefas')


@section('content')
    <h1>Editando tarefas</h1>

    @if ($errors->any())
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
            <input type="text" name="title" value="{{ $data->titulo }}" autocomplete="off">
        </label>

        <input type="submit" value="Salvar">
    </form>


@endsection