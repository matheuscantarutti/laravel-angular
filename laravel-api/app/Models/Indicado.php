<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\StatusIndicacao;

class Indicado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'telefone',
        'email',
        'status_indicacao'
    ];

    protected $attributes = [
        'status_indicacao' => StatusIndicacao::Iniciada['num']
    ];
}
