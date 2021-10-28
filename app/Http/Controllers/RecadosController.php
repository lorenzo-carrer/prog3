<?php

namespace App\Http\Controllers;

use App\Models\Recado;
use Illuminate\Http\Request;

class RecadosController extends Controller
{
    //envia o objeto recado
    public function index()
    {
        $recados =  Recado::orderBy('id', 'desc')->get();

        return view('recados.index', ['recados' => $recados, 'pagina' => 'recados']);
    }

    //envia para a página que irá criar um recado
    public function create()
    {
        return view('recados.create', ['pagina' => 'recados']);
    }

    //salva o recado
    public function insert(Request $form)
    {
        $recado = new Recado();

        $recado->nome = $form->nome;
        $recado->comentario = $form->comentario;

        $recado->save();

        return redirect()->route('recados.index');
    }

    //Envia para o formulário que irá receber as informações do recado
    public function edit(Recado $recado)
    {
        return view('recados.editar', ['recado' => $recado, 'pagina' => 'recados']);
    }
    //Recebe os dados e edita o recado
    public function update(Request $form, Recado $recado)
    {
        $recado->nome = $form->nome;
        $recado->comentario = $form->comentario;

        $recado->save();

        return redirect()->route('recados.index');
    }

    //Envia para o formulário que irá receber as informações, confirmando se quer excluir
    public function remove(Recado $recado)
    {
        return view('recados.excluir', ['recado' => $recado, 'pagina' => 'recados']);
    }
    //Recebe os dados e exclui
    public function delete(Recado $recado)
    {
        $recado->delete();

        return redirect()->route('recados.index');
    }

}
