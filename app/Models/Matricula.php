<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{

    protected $table = 'matricula';

    protected $fillable = [
        'id',
        'id_nomedoconcurso',
        'email',
        'preco',
        'idade',
        'telefone',


    ];


}
