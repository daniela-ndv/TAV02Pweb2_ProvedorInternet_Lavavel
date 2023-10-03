@extends('base.app')

@section('titulo', 'Cadastrar Novo Plano')

@section('content')
    @if($errors->any())
    <ul>
        @foreach ($errors->all() as $error )
            <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    @php
    if(!empty($plano->id)){
        $route = route('plano.update', $plano->id);
    } else{
        $route = route('plano.store');
    }
    @endphp

    <div>
        <div>
            <h3>Cadastrar Novo Plano</h3>
            <form action="{{ $route }}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- cria um hash de segurança -->

                @if (!empty($plano->id))
                    @method('PUT')
                @endif

                <input type="hidden" name="id"
                    value="@if (!empty($plano->id)) {{ $plano->id }}@elseif (!empty(old('id'))){{ old('id') }}@else{{ '' }} @endif">

                <label>
                    <span>Nome</span>
                    <input type="text" name="nome" placeholder="Nome do plano"
                        value="@if (!empty($plano->nome)) {{ $plano->nome }} @elseif(!empty(old('nome'))) {{ old('nome') }} @else {{ '' }} @endif">
                </label>

                <label>
                    <span>Tipo</span>
                        <select name="tipo" placeholder="Tipo do plano" value="@if(!empty($plano->tipo)){{$plano->tipo}}@elseif(!empty(old('tipo'))){{old('tipo')}}@else{{''}}@endif">
                            <option value="Residencial"
                                @if(!empty($plano->id)){{ ( $plano->tipo == "Residencial") ? 'selected' : '' }}
                                @else{{ '' }}@endif>Residencial
                            </option>
                            <option value="Empresarial"
                                @if(!empty($plano->id)){{ ( $plano->tipo == "Empresarial") ? 'selected' : '' }}
                                @else{{ '' }}@endif>Empresarial
                            </option>
                            <option value="Comercial"
                                @if(!empty($plano->id)){{ ( $plano->tipo == "Comercial") ? 'selected' : '' }}
                                @else{{ '' }}@endif>Comercial
                            </option>
                        </select>
                </label>

                <label>
                    <span>Taxa de Download</span>
                    <input type="text" name="download" placeholder="Taxa de Download"
                        value="@if (!empty($plano->download)) {{ $plano->download }} @elseif(!empty(old('download'))) {{ old('download') }} @else {{ '' }} @endif">
                </label>

                <label>
                    <span>Taxa de Upload</span>
                    <input type="text" name="upload" placeholder="Taxa de Upload"
                        value="@if (!empty($plano->upload)) {{ $plano->upload }} @elseif(!empty(old('upload'))) {{ old('upload') }} @else {{ '' }} @endif">
                </label>

                <label>
                    <span>Valor</span>
                    <input type="text" name="valor" placeholder="Valor do plano"
                        value="@if (!empty($plano->valor)) {{ $plano->valor }} @elseif(!empty(old('valor'))) {{ old('valor') }} @else {{ '' }} @endif">
                </label>

                <br>
                <br>
                <button
                    type="submit">Salvar</button>

                <button><a href="{{ route('plano.index') }}">Voltar</a></button>
            </form>
        </div>
    </div>
@endsection