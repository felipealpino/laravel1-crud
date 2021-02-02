@extends('layouts.admin')

@section('title', 'Listagem de tarefas')


@section('content')
    <h1> listagem de tarefas </h1>

    <a href="">Adicionar nova tarefa</a>

    @if(count($list) > 0)
        <ul>
        @foreach ($list as $item)
            <li>
                <a href=""> [@if ($item->resolvido === 1)
                    Desmarcar
                @else
                    Marcar
                @endif] </a>
                
                {{$item->titulo}}


                <a href="">[ editar ]</a>
                <a href="">[ excluir ]</a>

            </li>
        @endforeach
        </ul>
    @else
        Não existem itens para serem listados
    @endif

@endsection


