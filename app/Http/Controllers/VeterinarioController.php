<?php

namespace App\Http\Controllers;

use App\Especialidade;
use App\Veterinario;
use Illuminate\Http\Request;

class VeterinarioController extends Controller
{

    public function index()
    {
        $veterinarios = Veterinario::all();
        return view('veterinario.index', compact('veterinarios'));
    }

    public function create()
    {
        $dados = Especialidade::all();
        return view('veterinario.create', compact('dados'));
    }

    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|max:100|min:10',
            'crmv' => 'required|max:6|min:6',
            'especialidade_id' => 'required'
        ];
        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];
        $request->validate($regras, $msgs);

        $veterinario = new Veterinario();
        $veterinario->nome = $request->nome;
        $veterinario->crmv = $request->crmv;
        $veterinario->especialidade_id = $request->especialidade_id;
        $veterinario->save();

        return redirect()->route('veterinario.index');
    }

    public function show($id)
    {
        $dados = Veterinario::find($id);
        $espec = Especialidade::find($dados['especialidade_id']);
        return view('veterinario.show', compact('dados'), compact('espec'));
    }

    public function edit($id)
    {
        $dados = Veterinario::find($id);
        $espec = Especialidade::all();
        return view('veterinario.edit', compact('dados'), compact('espec'));
    }

    public function update(Request $request, $id)
    {
        $regras = [
            'nome' => 'required|max:100|min:10',
            'crmv' => 'required|max:6|min:6',
            'especialidade_id' => 'required'
        ];
        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];
        $request->validate($regras, $msgs);

        $veterinario = Veterinario::find($id);
        $veterinario->nome = $request->nome;
        $veterinario->crmv = $request->crmv;
        $veterinario->especialidade_id = $request->especialidade_id;
        $veterinario->save();

        return redirect()->route('veterinario.index');
    }

    public function destroy($id)
    {
        $veterinario = Veterinario::find($id);
        $veterinario->delete();
        return redirect()->route('veterinario.index');

    }
}
