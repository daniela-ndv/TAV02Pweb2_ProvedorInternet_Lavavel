@extends('base.app')
@section("titulo", 'Listagem de Setores')
@section('content')

    <h3>Listagem de Setores</h3> <br>
    <div>
        <div>
        <form action="{{ route('setor.search') }}" method="post">
          @csrf
          <p>Filtrar por: </p>
          <select name="tipo">
            <option value="nome">Nome</option>
            <option value="codigo">Código</option>
            <option value="atribuicoes">Atribuições</option>
          </select>
          <input type="text" name="valor">
            <button type="submit"> 
               Buscar
            </button>
            <a href="{{route('setor.index')}}">
              <button type="button">
                Limpar
              </button>
            </a>
        </form>
        </div>
        <div>
            <div>
                <br>
                <a href="{{route('setor.create')}}">
                    <button>
                        Cadastrar Novo
                    </button>
                </a>
            </div>
        </div>
    </div>

    <div>
        <div>
          <div>
            <div>
              <table>
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Código</th>
                    <th scope="col">Atribuições</th>
                  </tr>
                </thead>
                @foreach ($setores as $item)
                <tbody>
                  <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nome}}</td>
                    <td>{{$item->codigo}}</td>
                    <td>{{$item->atribuicoes}}</td>
                    <td>
                        <a href="{{route('setor.edit', $item->id)}}">
                            <button
                            type="button">
                                Editar
                            </button>
                        </a>
                        <a href="{{route('setor.destroy', $item->id)}}">
                            <button onclick="return confirm('Deseja excluir o registro?')">
                                Deletar
                            </button>
                        </a>
                    </td>
                  </tr>
                </tbody>
                @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
 @endsection