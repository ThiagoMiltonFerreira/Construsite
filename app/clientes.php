<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    public $timestamps = false;

    protected $hidden = [
        'id_cliente', '_token','_method',
    ];
    protected $fillable = [
        'nome_cliente', 'email_cliente', 'telefone_cliente','senha_cliente','data_nasc_cliente',
    ];
}
