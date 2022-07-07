<?php

 
use App\Http\Controllers\BeneficiadoController;
use App\Http\Controllers\ListaController;
use App\Models\Beneficiado;
use App\Models\Lista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
})->name('index');

 

Route::middleware('auth')->group(
    function () {
 
        Route::get('/dashboard/{lista?}', function (Lista $lista = null) {
            $lista = Lista::all();
            return view('lista', ['listas' => $lista]);
        })->name('dashboard');

        Route::get('/listas/{lista?}', function (Lista $lista = null) {
            $lista = Lista::all();
            return view('lista', ['listas' => $lista]);
        })->name('listas');

        Route::get('/lista', function () {
            return view('cadastrar-lista');
        })->name('lista');
        Route::post('/cadastrarLista', [ListaController::class, 'store'])->name('cadastrar.lista');
        Route::get('/beneficiado/{lista}', [BeneficiadoController::class, 'index'])->name('beneficiado');

        Route::post('/buscarbeneficiado', [BeneficiadoController::class, 'show'])->name('buscar.beneficiado');

        Route::get('/cadastrar/{lista}/{beneficiado}', function (Request $r, $lista, $beneficiado) {

            return view('cadastrar', ['lista' => $lista, 'beneficiado' => $beneficiado]);
        })->name('cadastro.beneficiado');



        //observar
        Route::get('/cadastrarBeneficiado', function () {
            return view('cadastrar');
        })->name('cadastrar.beneficiado.geral');

   
            Route::get('/editarBeneficiado/{beneficiado}/{lista?}', [BeneficiadoController::class, 'editarBeneficiado'])->name('editar.beneficiado');
            Route::get('/excluirBeneficiado/{beneficiado}', [BeneficiadoController::class, 'remove'])->name('excluir.beneficiado');
        Route::put('/alterarBeneficicado', [BeneficiadoController::class, 'update'])->name('editar.beneficiado.update');
        Route::get('/excluirBeneficiadoLista/{beneficiado}/{lista}', [ListaController::class, 'removerBeneficiado'])->name('excluir.beneficiado.lista');
 
 //fimobservar
 
        Route::get('/beneficiados', function () {

            $beneficiado = Beneficiado::all();
            return view('listar-beneficiado',['beneficiados'=>$beneficiado]);
        })->name('beneficiados');
 
        Route::post('/cadastroBeneficiado', [BeneficiadoController::class, 'store'])->name('cadastrar.beneficiado');

        Route::put('/alterarLista', [ListaController::class, 'update'])->name('editar.lista.update');
        Route::get('/editarLista/{lista}', [ListaController::class, 'editar'])->name('editar.lista');
        Route::get('/excluirLista/{lista}', [ListaController::class, 'excluir'])->name('excluir.lista');
        
    });

require __DIR__.'/auth.php';
