<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pessoa;


class PessoaController extends Controller
{
    public function listar()
    {
        return Pessoa::get();
    }

    public function cadastrar(Request $request)
    {
        $dados = [];
        $dados['nome'] = $request['nome'];
        $dados['idade'] = $request['idade'];
        return Pessoa::create($dados);
    }

    public function salvar(Request $request)
    {
        $pessoa = Pessoa::findOrFail($request['id']);
        $pessoa['nome'] = $request['nome'];
        $pessoa['idade'] = $request['idade'];
        $pessoa->save();
        return $pessoa;
    }
    public function carregar($id)
    {
        return Pessoa::where('id', '=', $id)->first();
    }
    public function excluir($id)
    {
        return Pessoa::where('id', '=', $id)->delete();
    }
}
