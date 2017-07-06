<?php

namespace App\Http\Controllers\Painel;

use App\Models\Participante;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParticipanteController extends Controller
{

    private $participante;

    public function __construct(Participante $participante) {
        $this->participante = $participante;
    }

    public function index() {

        $participantes = $this->participante->all();

        return view('painel.participante.index', compact('participantes'));
    }
}
