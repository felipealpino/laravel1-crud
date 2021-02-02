@extends('layouts.admin')

@section('title', 'Listagem de tarefas')


@section('content')
    <h1> listagem de tarefas </h1>

    <a href="{{route('tarefas.add')}}">Adicionar nova tarefa</a>

    @if(count($list) > 0)
        <ul>
        @foreach ($list as $item)
            <li>
                <a href="{{ route('tarefas.done', ['id'=>$item->id]) }}"> [@if ($item->resolvido === 1)
                    Desmarcar
                @else
                    Marcar
                @endif] </a>
                
                {{$item->titulo}}


                <a href="{{ route('tarefas.edit', ['id'=>$item->id]) }}">[ editar ]</a>
                <a href="{{ route('tarefas.del', ['id'=>$item->id]) }}">[ excluir ]</a>

            </li>
        @endforeach
        </ul>
    @else
        Não existem itens para serem listados
    @endif

@endsection


