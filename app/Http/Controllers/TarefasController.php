<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Models\Tarefa;

class TarefasController extends Controller{
    
    public function list(){
        //$list = DB::select('SELECT * FROM tarefas');
        $list = Tarefa::all();

        return view('tarefas.list', [
            'list' => $list 
        ]);
    }


    public function add(){
        return view('tarefas.add');
    }


    public function addAction(Request $request){
        $request->validate([ 
            'title' => ['required', 'string']
        ]); 
    
        $title = $request->input('title');
            
        // DB::insert('INSERT INTO tarefas (titulo) VALUES (:titulo)', [
        //     'titulo' => $title
        // ]);

        $t = new Tarefa;
        $t-> titulo = $title;
        $t-> save();

        return redirect()->route('tarefas.list');
    }


    public function edit($id){
        // $data = DB::select('SELECT * FROM tarefas WHERE id = :id', [
        //     'id' => $id
        // ]);
        

        // $data = Tarefa::find($id);
        $data = Tarefa::where('id', $id)->first();

        if($data){
            return view('tarefas.edit', [
                'data' => $data 
            ]);
        } else {
            return redirect()
            ->route('tarefas.list')
            ->with('warning','Impossivel editar, id não existente');
        }

        return view('tarefas.edit');
    }
    public function editAction(Request $request, $id){
        $request->validate([
            'title' => ['required', 'string']
        ]);
        
        $titulo = $request->input('title');
        
        // DB::update('UPDATE tarefas SET titulo = :titulo WHERE id = :id', [
        //     'id' => $id,
        //     'titulo' => $titulo 
        // ]);

        // $t = Tarefa::where('id', $id)->first();
        // $t->titulo = $titulo;
        // $t->save();

        Tarefa::where('id', $id)->update([
            'titulo' => $titulo
        ]);

        return redirect()->route('tarefas.list');           
 
    }


    public function del($id){
        // DB::delete('DELETE FROM tarefas WHERE id = :id', [
        //     'id' => $id
        // ]);

        Tarefa::where('id', $id)->delete();

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
            // DB::update('UPDATE tarefas SET resolvido = 1 - resolvido WHERE id = :id', [
            //     'id' => $id
            // ]);
        /**
         * Explicação opção2
         * Original: 0 
         * 1 - 0 = 1
         * 
         * Original: 1
         * 1 - 1 = 0
         */

            $t = Tarefa::where('id', $id)->first();
            if($t){
                $t->resolvido = 1 - $t->resolvido;
                $t->save();
            }

        return redirect()->route('tarefas.list');
    }


}
