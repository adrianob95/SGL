<?php

 
use App\Http\Controllers\BeneficiadoController;
use App\Http\Controllers\ListaController;
use App\Models\Lista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
})->name('index');

Route::get('/listas', function () {
    return view('lista');
})->middleware(['auth'])->name('dashboard');




Route::middleware('guest')->group(
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







        Route::post('/cadastroBeneficiado', [BeneficiadoController::class, 'store'])->name('cadastrar.beneficiado');


    });

require __DIR__.'/auth.php';
