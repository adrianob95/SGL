<?php

namespace App\Http\Controllers;

use App\Models\Beneficiado;
use App\Models\Lista;
use Error;
use Illuminate\Http\Request;

class BeneficiadoController extends Controller
{
     public function index(Request $r, Lista $lista)
     {
          $lista->load('beneficiado');
          // $lista->hasBeneficiado()->attach(1);
          return view('beneficiado', ['listas' => $lista]);
     }

     public function show(Request $r)
     {

          $beneficiad  = Beneficiado::where('documento', $r->beneficiado)->orWhere('nome', $r->beneficiado)->first();
           $lista =  Lista::find($r->lista);
          if ($beneficiad) {
               if($lista->hasOne($beneficiad)){
                    foreach ($lista->beneficiado as $value) {
                         if ($value->id == $beneficiad->id){
                              return redirect()->route('beneficiado', $r->lista)->with('mensagem', 'Beneficiado ' . $beneficiad->nome . ' já adicionado na lista!');
                         }
                         
                    } 
                
               }
             
              $lista->beneficiado()->attach($beneficiad->id);
               return redirect()->route('beneficiado', [$r->lista])->with('mensagem', 'Beneficiado ' . $beneficiad->nome . 'adicionado na lista!');
         
              
          }
          
          else 
          //return $r->lista;
            return redirect()->route('cadastro.beneficiado', ['lista'=> $r->lista, 'beneficiado' =>  $r->beneficiado]);
          
     }

     public function store (Request $r)
     {

          $beneficiado = Beneficiado::create($r->all());
          if ($beneficiado) {
           $lista = Lista::find($r->lista);
           if($lista){
             
                    $lista->beneficiado()->attach($beneficiado->id);
               return redirect()->route('beneficiado', [$r->lista])->with('mensagem', 'Beneficiado criado e adicionado a lista com sucesso!');
               }
              
               return redirect()->route('beneficiados')->with('mensagem', 'Beneficiado '.$beneficiado->nome.' criado com sucesso!');
       
      } else return 'inssucesso';

     }

     public function editarBeneficiado(Request $r, Beneficiado $beneficiado, Lista $lista =null)
     {
          return view('editar-beneficiado', ['beneficiado' => $beneficiado, 'lista' => $lista]);     
     }



     public function update(Request $r)
     {

          Beneficiado::find($r->beneficiado)->update($r->all());
$beneficiado =
          Beneficiado::find($r->beneficiado);

          // $beneficiado->nome = $r->mes;
          // $beneficiado->documento = $r->ano;
          // $beneficiado->enderero = $r->observacao;
         
         // $beneficiado->save(Request $r);
if($r->lista)
          return redirect()->route('beneficiado', $r->lista)->with('mensagem', 'Dados do Beneficiado ' . $beneficiado->nome . ' atualizado com sucesso!');
          else 
          return redirect()->route('listas') -> with('mensagem', 'Dados do Beneficiado ' . $beneficiado->nome . ' atualizado com sucesso!');
       
         
     }

     public function remove(){


     }
}