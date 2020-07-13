<?php

namespace App\Http\Controllers;

use App\Especialidade;
use Illuminate\Http\Request;

class EspecialidadeController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {

        $especialidades = Especialidade::all();
        return view('especialidade.index', compact('especialidades'));
    }

    public function create()
    {

        return view('especialidade.create');
    }

    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|max:30|min:5',
            'descricao' => 'required|max:250|min:5'
        ];
        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];
        $request->validate($regras, $msgs);

        $especialidades = new Especialidade();
        $especialidades->nome = $request->nome;
        $especialidades->descricao = $request->descricao;
        $especialidades->save();

        return redirect()->route('especialidade.index');
    }

    public function show($id)
    {
        $dados = Especialidade::find($id);
        return view('especialidade.show', compact('dados'));
    }

    public function edit($id)
    {
        $dados = Especialidade::find($id);
        return view('especialidade.edit', compact('dados'));
    }

    public function update(Request $request, $id)
    {
        $regras = [
            'nome' => 'required|max:30|min:5',
            'descricao' => 'required|max:250|min:5'
        ];
        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];
        $request->validate($regras, $msgs);

        $especialidades = Especialidade::find($id);
        $especialidades->nome = $request->nome;
        $especialidades->descricao = $request->descricao;
        $especialidades->save();

        return redirect()->route('especialidade.index');
    }

    public function destroy($id)
    {
        $especialidades = Especialidade::find($id);
        $especialidades->delete();
        return redirect()->route('especialidade.index');
    }
}
