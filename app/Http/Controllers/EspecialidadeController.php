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
