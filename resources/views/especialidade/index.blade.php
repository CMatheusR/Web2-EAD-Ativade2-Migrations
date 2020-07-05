 <!-- https://material.io/resources/icons/?icon=delete&style=baseline -->

@extends('templates.main', ['titulo' => "Especialidade", 'tag' => "ESP"])

@section('titulo') Especialidade @endsection

@section('conteudo')

    <div class='row'>
        <div class='col-sm-6'>
            <a  href="{{ route('especialidade.create') }}" type="button" class="btn btn-primary btn-block">
                <b>Cadastrar Nova Especialidade</b>
            </a>
        </div>
        <div class='col-sm-5' style="text-align: center">
            <input type="text" list="clientes" class="form-control"  autocomplete="on" placeholder="buscar">
            <datalist id="clientes">
                @foreach ($especialidades as $item)
                    <option value="{{ $item['nome'] }}">
                @endforeach
            </datalist>
        </div>
        <div class='col-sm-1' style="text-align: center">
            <button type="button" class="btn btn-default btn-block">
                <img class="small" src="{{ asset('img/icons/search.svg') }}">
            </button>
        </div>
    </div>
    <br>
    <x-tablelist :header="['NOME', 'EVENTOS']" :data="$especialidades" :tipo="3" />


@endsection




