<?php

namespace App;

use App\Models\Evento;
use App\Models\Inscricao;
use App\Models\Participante;
use App\Models\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function participante() {
        return $this->hasOne(Participante::class);
    }

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function inscrito($eventoId) {
        $inscricoes = Inscricao::where('evento_id', $eventoId)->where('user_id', $this->id)->get();
        foreach ($inscricoes as $inscricao){
            if ($inscricao->evento_id == $eventoId){
                return true;
            }
        }
        return false;
    }

    public function meusEventos() {
//        return $this->belongsToMany(Evento::class, 'inscricoes');
//        dd($this->id);
        $inscricoes = Inscricao::where('user_id', $this->id)->get();
        $eventos = [];
        foreach ($inscricoes as $inscricao) {
            $evento = Evento::find($inscricao['evento_id']);
            array_push($eventos, $evento);
        }

        return $eventos;
    }
}
