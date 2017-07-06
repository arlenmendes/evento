<?php

namespace App\Http\Controllers\Painel;

use App\Http\Requests\TipoEventoFormRequest;
use App\Models\TipoEvento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TipoEventoController extends Controller
{

    private $tiposEvento;

    public function __construct(TipoEvento $tipoEvento) {
        $this->tiposEvento = $tipoEvento;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = $this->tiposEvento->all();
        return view('painel.tipo_evento.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('painel.tipo_evento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoEventoFormRequest $request)
    {
        $dados = $request->all();

        $insert = $this->tiposEvento->create($dados);

        if ($insert)
            return redirect()->route('tipos-evento.index');
        else
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoEvento = $this->tiposEvento->find($id);

        return view('painel.tipo_evento.create', compact('tipoEvento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipoEventoFormRequest $request, $id)
    {
        $tipoEvento = $this->tiposEvento->find($id);

        $tipoEvento->update($request->all());

        return redirect()->route('tipos-evento.index');
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
