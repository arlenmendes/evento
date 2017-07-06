<?php

namespace App\Http\Controllers\Participante;

use App\Http\Requests\ParticipanteFormRequest;
use App\Models\Participante;
use Dotenv\Validator;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParticipanteController extends Controller
{

    private $participante;
    public function __construct(Participante $participante) {
        $this->middleware('cadastroCompletoParticipante')->except(['create', 'store']);
        $this->middleware('cadastroJaEfetuado')->only(['create', 'store']);
        $this->participante = $participante;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('participante.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('participante.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\ParticipanteFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParticipanteFormRequest $request)
    {
        $dados = $request->all();

        $dados['necessidades_especiais'] = (!isset($dados['necessidades_especiais'])) ? 0 : 1;
        //formata a data de nascimento
        $data_nascimento = date("Y-m-d", strtotime($dados['data_nascimento']));
        $dados['data_nascimento'] = $data_nascimento;

        //insere os dados
        $insert = $this->participante->create($dados);

        if ($insert) {
            return redirect()->route("participantes.index");
        } else {
            return redirect()->back();
        }
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
        $participante = Participante::find($id);
        $participante['data_nascimento'] = date('d-m-Y', strtotime($participante['data_nascimento']));

        return view('participante.create', compact('participante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dados = $request->all();
        $participante = $this->participante->find($id);
        $dados['necessidades_especiais'] = (!isset($dados['necessidades_especiais'])) ? 0 : 1;
        //formata a data de nascimento
        $data_nascimento = date("Y-m-d", strtotime($dados['data_nascimento']));
        $dados['data_nascimento'] = $data_nascimento;

        //insere os dados
        $update = $participante->update($dados);

        if ($update) {
            return redirect()->route("participantes.index");
        } else {
            return redirect()->back();
        }
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
