<?php

namespace App\Http\Controllers;

use App\Models\Beneficiado;
use App\Models\Lista;
use Illuminate\Http\Request;
  

class ListaController extends Controller
{
    public function store(Request $r)
    {
       
        $lista = Lista::create($r->all());
 
        if($lista){
         return redirect()->route('beneficiado', [$lista])->with('mensagem',' Lista criada com sucesso!');
        } else return 'insucesso';

    }




    public function editar(Request $r, Lista $lista)
    {

       
      
            return view('editar-lista', ['lista'=> $lista]);
        
    }

    public function removerBeneficiadoSistema(Request $r, Beneficiado $beneficiado)
    {

        $beneficiado->delete();

        return redirect()->route('beneficiados')->with('mensagem', 'Beneficiado '.$beneficiado->nome.' excluido permanentemente do sistema com sucesso!');
    }
    



    public function excluir(Request $r)
    {

        $lista = Lista::destroy($r->lista);
        
            return redirect()->route('listas')->with('mensagem', ' Lista excluida com sucesso!');
        
    }

    public function update(Request $r)
    {

        $lista = Lista::find($r->lista);
        $lista->mes = $r->mes;
        $lista->ano = $r->ano;
        $lista->observacao = $r->observacao;
        $lista->save();

        return redirect()->route('listas')->with('mensagem', ' Lista atualizada com sucesso!');
    }

    public function removerBeneficiado(Request $r)
    {

        $lista = Lista::find($r->lista);


        $lista->beneficiado()->detach($r->beneficiado);
        return redirect()->route('beneficiado', $r->lista) -> with('mensagem', 'Beneficiado ' . Beneficiado::find($r->beneficiado)->nome . ' removido da lista com sucesso!');
       
    }

    
}
