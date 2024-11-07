<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nome',
        'cpf',
        'tipo',
        'telefone',
        'email',
    ];

    protected $casts = [
        'id' => 'integer',
        'nome' => 'string',
        'cpf' => 'string',
        'tipo' => 'string',
        'telefone' => 'string',
        'email' => 'string'
    ];
}
