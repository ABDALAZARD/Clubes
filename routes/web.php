<?php

use App\Http\Controllers\Jogador\ControleJogador;
use App\Http\Controllers\Selecao\ControleSelecao;
use App\Http\Controllers\Time\ControleEquipe;
use App\Http\Controllers\Torneio\ControleTorneio;
use Illuminate\Support\Facades\Route;

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

//Torneio
//Seleção
    //acessa a homepage, que mostra os torneios em forma de botão
    //Também envia para a homepage uma lista das seleções presentes no banco
    Route::get("/", [ControleTorneio::class, 'index'])->name('home');
        //Exclui torneio do sistema
        Route::get('excluir_torneio/{id_torneio}', [ControleTorneio::class, 'delete'])->name('excluirTorneio');
        //Exclui seleção da lista
        Route::get('excluir_selecao/{id}', [ControleSelecao::class, 'delete'])->name('excluirSelecao');


    //acessa a criação de um novo torneio
    Route::get('/criartorneio', [ControleTorneio::class, "create"])->name('criartorneio');
            //Cadastra um torneio
            Route::post('/grava_torneio', [ControleTorneio::class, 'store'])->name('grava_torneio');

    //detalhe dos torneios(times, e etc)
    Route::get("/acessoTorneio/{id}", [ControleTorneio::class, "detalheTorneio"])->name('acessoTorneio');

            //Time
                //Redireciona para a pagina de criação de times
                Route::get('inscreveEquipe/{id}', [ControleEquipe::class, "create"])->name("inscreverEquipe");

                            //Inscreve os times no torneio em questão
                            Route::post('/grava_equipe', [ControleEquipe::class, "store"])->name('grava_equipe');

                //Exclui time da competição
                Route::get('excluir_time/{id_time}', [ControleEquipe::class, 'delete'])->name('excluirTime');


                //Acessa Dados dos times(Elenco e etc)
                Route::get('/detalhe_time/{id_time}', [ControleEquipe::class, 'listarJogadores'])->name('detalheTime');
                        //Jogadores
                            //Redireciona para registrar um jogador no time em questão
                            Route::get('/insereJogador/{time_id}', [ControleJogador::class, 'create'])->name("insereJogador");
                                        //Cadastra jogadores no time em questão
                                        Route::post('/grava_jogador', [ControleJogador::class, 'store'])->name('grava_jogador');
                           //Excluir jogador do time
                           Route::get('excluir_jogador/{id_jogador}', [ControleJogador::class, 'delete'])->name('excluir_jogador');


//Seleção
Route::get('/acessoSelecao/{id}', [ControleSelecao::class, 'detalheSelecao'])->name('acessarSelecao');
    //Exclui jogador da convocação da seleção
    Route::get('/desconvoca/{id}', [ControleJogador::class, 'desconvoca'])->name('desconvoca');

    //Acessa page de registro de nova seleção
    Route::get('/registroSelecao', [ControleSelecao::class, 'create'])->name("inscreverSelecao");
        //Registra nova seleção
        Route::post('/gravaselecao', [ControleSelecao::class, 'store'])->name("gravaSelecao");
