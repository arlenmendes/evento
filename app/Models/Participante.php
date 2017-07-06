<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    protected $fillable = [
        'telefone', 'cpf', 'data_nascimento', 'cidade', 'uf', 'instituicao', 'curso', 'matricula', 'necessidades_especiais', 'necessidades_especiais_comentario', 'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
