<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix' => 'painel', 'middleware' =>['auth','isParticipante']], function (){
    Route::get('/', 'Painel\PainelController@index');
    //rotas para gerenciar participantes
    Route::get('/participantes', 'Painel\ParticipanteController@index')->name('painel.participantes.index');
    //rotas para gerenciar palestrantes
    Route::resource('/palestrantes', 'Painel\PalestranteController');
    //rotas para gerenciar tipos de eventos
    Route::resource('/tipos-evento', 'Painel\TipoEventoController');
    //rotas para gerenciar eventos
    Route::resource('/eventos', 'Painel\EventoController');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'participantes','middleware'=> ['auth', 'isAdm']], function (){
    Route::resource('/', 'Participante\ParticipanteController');
    //rotas para inscriçoes
    Route::get('/eventos/{diaAtual?}/{mensagem?}', 'Participante\InscricaoController@eventos');
    //dia atual e o dia do evento que ele esta selecionando
    Route::get('/inscrever/{id}/{diaAtual}', 'Participante\InscricaoController@inscrever');
    Route::get('/cancelar-inscricao/{id}/{diaAtual}', 'Participante\InscricaoController@cancelarInscricao');
    Route::get('/meus-eventos', 'Participante\InscricaoController@meusEventos');
});

Route::get('/', function () {
    return redirect('/participantes');
});

Route::get('/home', function() {
   return redirect('/participantes');
});