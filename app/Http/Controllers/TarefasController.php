<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TarefasController extends Controller{
    
    public function list(){
        $list = DB::select('SELECT * FROM tarefas');

        return view('tarefas.list', [
            'list' => $list 
        ]);
    }


    public function add(){
        return view('tarefas.add');
    }
    public function addAction(Request $request){
        if($request->filled('title')) {
            $title = $request->input('title');
            
            DB::insert('INSERT INTO tarefas (titulo) VALUES (:titulo)', [
                'titulo' => $title
            ]);

            return redirect()->route('tarefas.list');

        } else {
            return redirect()
            ->route('tarefas.add')
            ->with('warning', 'Você não preencheu o título');
        }
    }


    public function edit($id){
        $data = DB::select('SELECT * FROM tarefas WHERE id = :id', [
            'id' => $id
        ]);

        if(count($data) > 0){
            return view('tarefas.edit', [
                'data' => $data[0] // primeiro item da consulta (teoricamente é para ter só uma) 
            ]);
        } else {
            return redirect()
            ->route('tarefas.list')
            ->with('warning','Impossivel editar, id não existente');
        }

        return view('tarefas.edit');
    }
    public function editAction(Request $request, $id){
        if($request->filled('title')){  
            $titulo = $request->input('title');
            
            DB::update('UPDATE tarefas SET titulo = :titulo WHERE id = :id', [
                'id' => $id,
                'titulo' => $titulo 
            ]);

            return redirect()->route('tarefas.list');           
        
        } else {
            return redirect()
            ->route('tarefas.edit', ['id'=>$id])
            ->with('warning','Impossivel editar, o campo está vazio');
        }
    }


    public function del($id){
        DB::delete('DELETE FROM tarefas WHERE id = :id', [
            'id' => $id
        ]);

        return redirect()->route('tarefas.list');
    }


    public function done($id){

        /*opção 1: select + update
            $data = DB::select('SELECT * FROM tarefas WHERE id = :id', [
                'id' => $id
            ]); 
            $res = 0;
            if(count($data) > 0){ 
                if($data[0]->resolvido === 0){
                    $res = 1;
                }
            }

            DB::update('UPDATE tarefas SET resolvido = :resolvido WHERE id = :id',[
                'resolvido' => $res,
                'id' => $id
            ]);
        */

        //opção 2: update matemático
            DB::update('UPDATE tarefas SET resolvido = 1 - resolvido WHERE id = :id', [
                'id' => $id
            ]);
        /**
         * Explicação opção2
         * Original: 0 
         * 1 - 0 = 1
         * 
         * Original: 1
         * 1 - 1 = 0
         */

        return redirect()->route('tarefas.list');
    }


}
