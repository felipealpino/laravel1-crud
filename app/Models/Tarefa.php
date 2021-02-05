<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model{
    use HasFactory;

       /**
     * → O Eloquent assume que o nome da tabela é o nome da classe no plural
     * para mudar isso, usamos: protected $table =  'nome_tabela' 
     */ 
    protected $table =  'tarefas';

    /**
     * → O Eloquent tambem assume que a chave primaria se chama id
     * para mudar isso usamos: protected $primaryKey = 'nome_coluna';
     * → Ele tambem assume que é um auto increment
     * para mudar isso usamos: public $incrementing = false ou true
     * → Ele tambem deduz o tipo da chave primaria
     * para mudar isso usamos: protected $keyTtype = 'tipo'
     * → Ele tambem deduz que existem 2 campos na tabela fora o campo id, que são os campos: created_at e updated_at
     * ele vai tentar colocar uma data nesses campos, e caso nao existirem, vai dar error
     * para mudar isso usamos: public $timestamps = false 
     * caso tiver com outro nome colocamos, avisamos para o Eloquent:
     * const CREATED_AT = 'date_created'
     * const UPDATED_AT = 'date_updated' 
     */
    protected $primaryKey = 'id';
    public $incrementing = true;
    // protected $keyTtype = 'int';
    public $timestamps = false ;


    
}
