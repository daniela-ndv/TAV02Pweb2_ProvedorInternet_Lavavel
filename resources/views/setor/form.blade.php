@extends('base.app')

@section('titulo', 'Cadastrar Novo Setor')

@section('content')
    @if($errors->any())
    <ul>
        @foreach ($errors->all() as $error )
            <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    @php
    if(!empty($setor->id)){
        $route = route('setor.update', $setor->id);
    } else{
        $route = route('setor.store');
    }
    @endphp

    <div>
        <div>
            <h3>Cadastrar Novo Setor</h3>
            <form action="{{ $route }}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- cria um hash de segurança -->

                @if (!empty($setor->id))
                    @method('PUT')
                @endif

                <input type="hidden" name="id"
                    value="@if (!empty($setor->id)) {{ $setor->id }}@elseif (!empty(old('id'))){{ old('id') }}@else{{ '' }} @endif">

                <label>
                    <span>Nome</span>
                    <input type="text" name="nome" placeholder="Nome do setor"
                        value="@if (!empty($setor->nome)) {{ $setor->nome }} @elseif(!empty(old('nome'))) {{ old('nome') }} @else {{ '' }} @endif">
                </label>

                <label>
                    <span>Código</span>
                    <input type="text" name="codigo" placeholder="Código do setor"
                        value="@if (!empty($setor->codigo)) {{ $setor->codigo }} @elseif(!empty(old('codigo'))) {{ old('codigo') }} @else {{ '' }} @endif">
                </label>

                <label>
                    <span>Atribuições</span>
                    <input type="text" name="atribuicoes" placeholder="Atribuições do setor"
                        value="@if (!empty($setor->atribuicoes)) {{ $setor->atribuicoes }} @elseif(!empty(old('atribuicoes'))) {{ old('atribuicoes') }} @else {{ '' }} @endif">
                </label>

                <br>
                <br>
                <button
                    type="submit">Salvar</button>

                <button><a href="{{ route('setor.index') }}">Voltar</a></button>
            </form>
        </div>
    </div>
@endsection