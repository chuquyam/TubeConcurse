<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplinas extends Model
{

    protected $table = 'disciplinas';

    protected $fillable = [
        'id',
        'coddisciplina',
        'nomedadisciplina',
        'descricao',
        'tipo',
        'link',
        'id_codconcurso',

    ];
}
