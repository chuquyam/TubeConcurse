<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class concursos extends Model
{
    //use HasFactory;

    protected $table = 'concursos';

    protected $fillable = [
        'codconcurso',
        'id_nomedoconcurso',
        'numerodoedital',
        'nomedoinstituto',
        'nomedocargo',
        'nomedaorganizadora',
        'datadaprova',
        'datadeinicio',
        'datafinal',
        'nomeinterno',

    ];

    protected $dates = [
        'datadaprova',
        'datadeinicio',
        'datafinal',
    ];

    protected $dateFormat = 'Y-m-d';


}
