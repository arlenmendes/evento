<?php

namespace App\Http\Controllers\Painel;

use App\Models\Evento;
use App\Models\Palestrante;
use App\Models\Participante;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PainelController extends Controller
{

    private $participante;
    private $palestrante;
    private $evento;

    public function __construct(Participante $participante, Evento $evento, Palestrante $palestrante) {
        $this->participante = $participante;
        $this->palestrante = $palestrante;
        $this->evento = $evento;
    }

    public function index () {
        $quantidadeEventos = count($this->evento->all());
        $quantidadePalestrantes = count($this->palestrante->all());
        $quantidadeParticipantes = count($this->participante->all());
        return view('painel.home.index', compact('quantidadeParticipantes', 'quantidadeEventos', 'quantidadePalestrantes'));
    }
}
