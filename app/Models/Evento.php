<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = ['titulo','descricao','data','horario','duracao','vagas','vagas_ocupadas','vagas_espera','vagas_espera','vagas_espera_ocupadas','tipo_evento_id'];

    public function tipoEvento() {
        return $this->belongsTo(TipoEvento::class);
    }
}
