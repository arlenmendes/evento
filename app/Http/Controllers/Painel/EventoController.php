<?php

namespace App\Http\Controllers\Painel;

use App\Http\Requests\EventoFormRquest;
use App\Models\Evento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TipoEvento;

class EventoController extends Controller
{

    private $evento;

    public function __construct(Evento $evento) {
        $this->evento = $evento;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = $this->evento->all();
        return view('painel.evento.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposEvento = TipoEvento::all();
        return view('painel.evento.create', compact('tiposEvento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventoFormRquest $request)
    {
        $dados = $request->all();
        $dados['data'] = date("Y-m-d", strtotime($dados['data']));

        $dados['vagas_ocupadas'] = 0;
        $dados['vagas_espera_ocupadas'] = 0;
        $insert = $this->evento->create($dados);
        if ($insert)
            return redirect()->route('eventos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evento = $this->evento->find($id);
        return view('painel.evento.show', compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tiposEvento = TipoEvento::all();
        $evento = $this->evento->find($id);
        return view('painel.evento.create', compact('evento',   'tiposEvento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventoFormRquest $request, $id)
    {
        $evento = $this->evento->find($id);

        $dados = $request->all();
        $dados['data'] = date("Y-m-d", strtotime($dados['data']));

        if ($evento->vagas_ocupadas > $dados['vagas']){
            $dados['vagas'] = $evento->vagas_ocupadas;
        }

        $evento->update($dados);
        return redirect()->route('eventos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
