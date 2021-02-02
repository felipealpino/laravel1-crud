<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ConfigController extends Controller {
    
    public function index(Request $request){

        $arr = [
            'nome'=>"Felipe",
            'idade'=>25
        ]; 

        return view('admin\config', $arr);  //pode ser usado tambem admin.config
    }

    public function info(){
        echo 'Bem vindo a config/info';
    }

    public function permissoes(){
        echo "Bem vindo a config/permissoes , no plural";
    }
    
}
