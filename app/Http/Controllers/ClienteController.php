<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {

        $clientes = Cliente::all();
        return view('cliente.index', compact('clientes'));
    }

    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|max:100|min:10',
            'email' => 'required|unique:clientes',
            'telefone' => 'required|max:13|min:11'
        ];
        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];
        $request->validate($regras, $msgs);

        $cliente = new Cliente();
        $cliente->nome = $request->nome;
        $cliente->email = $request->email;
        $cliente->telefone = $request->telefone;

        $cliente->save();

        return redirect()->route('cliente.index');
    }

    public function create()
    {
        return view('cliente.create');
    }

    public function show($id)
    {
        $dados = Cliente::find($id);
        return view('cliente.show', compact('dados'));
    }

    public function edit($id)
    {

        $dados = Cliente::find($id);

        return view('cliente.edit', compact('dados'));
    }

    public function update(Request $request, $id)
    {
        $regras = [
            'nome' => 'required|max:100|min:10',
            'email' => 'required',
            'telefone' => 'required|max:13|min:11'
        ];
        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];
        $request->validate($regras, $msgs);

        $cliente = Cliente::find($id);
        $cliente->nome = $request->nome;
        $cliente->email = $request->email;
        $cliente->telefone = $request->telefone;
        $cliente->save();

        return redirect()->route('cliente.index');
    }

    public function destroy($id)
    {

        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect()->route('cliente.index');
    }
}
