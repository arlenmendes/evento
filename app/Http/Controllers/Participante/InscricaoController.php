<?php

namespace App\Http\Controllers\Participante;

use App\Models\Evento;
use App\Models\Inscricao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InscricaoController extends Controller
{

    public function eventos($diaAtual = 'segunda', $mensagem = false) {
//        $eventos = Evento::all();
        $eventos['segunda'] = Evento::where('data', "2017-10-22")->get();
        $eventos['terca'] = Evento::where('data', "2017-10-23")->get();
        $eventos['quarta'] = Evento::where('data', "2017-10-24")->get();
        $eventos['quinta'] = Evento::where('data', "2017-10-25")->get();
        $eventos['sexta'] = Evento::where('data', "2017-10-26")->get();
        $eventos['sabado'] = Evento::where('data', "2017-10-27")->get();
        $eventos['domingo'] = Evento::where('data', "2017-10-28")->get();

        return view('participante.evento.index', compact('eventos', 'diaAtual', 'mensagem'));
    }

    public function inscrever($idEvento, $diaAtual) {
        $inscricao = Inscricao::where('user_id', auth()->user()->id)->where('evento_id', $idEvento)->get();
        if (!(count($inscricao) > 0)) {
            $evento = Evento::find($idEvento);
            $dados['evento_id'] = $idEvento;
            $dados['user_id'] = auth()->user()->id;
            $dados['presenca'] = false;
            if ($evento->vagas > $evento->vagas_ocupadas) {
                $evento->vagas_ocupadas++;
                $evento->update();
                $dados['espera'] = false;
                $insert = Inscricao::create($dados);
                $mensagem = "Inscriçao realizada";
                return redirect("/participantes/eventos/{$diaAtual}/{$mensagem}");
            }elseif($evento->vagas_espera > $evento->vagas_espera_ocupadas) {
                $evento->vagas_espera_ocupadas++;
                $evento->update();
                $dados['espera'] = true;
                $insert = Inscricao::create($dados);
                $mensagem = "Inscriçao realizada para fila de espera";
                return redirect("/participantes/eventos/{$diaAtual}/{$mensagem}");
            }
        } else {
            $mensagem = "Voce ja esta inscrito neste evento";
//            return redirect("/participantes/eventos/{$diaAtual}/{$mensagem}");
            return redirect()->action('Participante\InscricaoController@eventos',['diaAtual' => $diaAtual, 'mensagem'=> $mensagem]);
        }
    }

    public function cancelarInscricao($eventoId, $diaAtual) {
        $inscricao  = Inscricao::where('evento_id', $eventoId)->where('user_id', auth()->user()->id)->first();
        $evento = Evento::find($eventoId);
        if ($evento->vagas == $evento->vagas_ocupadas && $evento->vagas_espera > $evento->vagas_espera_ocupadas && $inscricao->espera == false){
            $inscricao->delete();
            $insc = Inscricao::where('evento_id', $eventoId)->where('espera', true)->orderBy('created_at', 'asc')->limit(1)->get();
            $insc[0]->espera = false;
            $insc[0]->update();
            $evento->vagas_espera_ocupadas--;
            $evento->update();

        } else if ($inscricao->espera == true) {
            $inscricao->delete();
            $evento->vagas_espera_ocupadas--;
            $evento->update();
        } else {
            $inscricao->delete();
            $evento->vagas_ocupadas--;
            $evento->update();
        }

        $mensagem = "Inscriçao cancelada.";
        return redirect("/participantes/eventos/{$diaAtual}/{$mensagem}");

    }

    public function meusEventos() {
        $eventos = auth()->user()->meusEventos();
        return view('participante.evento.meus-eventos', compact('eventos'));
    }
}
