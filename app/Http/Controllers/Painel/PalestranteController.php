<?php

namespace App\Http\Controllers\Painel;

use App\Http\Requests\PalestranteFormRequest;
use App\Http\Requests\PalestranteUpdateFormRequest;
use App\Models\Palestrante;
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PalestranteController extends Controller
{
    private $palestrante;
    public function __construct(Palestrante $palestrante) {
        $this->palestrante = $palestrante;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $palestrantes = $this->palestrante->all();
        return view('painel.palestrante.index', compact('palestrantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('painel.palestrante.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PalestranteFormRequest $request)
    {
        $dados = $request->all();

        $imagem = $request->file('imagem');

        $imagemName = time().rand(1111,9999).'.'.$imagem->getClientOriginalExtension();
        $imagem->move('img/palestrantes', $imagemName);

        $dados['foto'] = $imagemName;

        $insert = $this->palestrante->create($dados);

        if ($insert)
            return redirect()->route('palestrantes.index');
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
        $palestrante = $this->palestrante->find($id);
        return view('painel.palestrante.show', compact('palestrante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $palestrante = $this->palestrante->find($id);

        return view('painel.palestrante.create', compact('palestrante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PalestranteUpdateFormRequest $request, $id)
    {

        $palestrante = $this->palestrante->find($id);

        $dados = $request->all();

        $imagem = $request->file('imagem');

        if (isset($imagem)) {
            File::delete(public_path('img/palestrantes/'.$palestrante->foto));

            $imagemName = time().rand(1111,9999).'.'.$imagem->getClientOriginalExtension();
            $imagem->move('img/palestrantes', $imagemName);

            $dados['foto'] = $imagemName;
        }

        $insert = $palestrante->update($dados);

        if ($insert)
            return redirect()->route('palestrantes.index');
        else
            return redirect()->back();
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
