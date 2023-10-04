@extends('base.app')
@section("titulo", 'Listagem de Planos')
@section('content')

    <h3>Listagem de Planos</h3> <br>
    <div>
        <div>
        <form action="{{ route('plano.search') }}" method="post">
          @csrf
          <p>Filtrar por: </p>
          <select name="tipo">
            <option value="nome">Nome</option>
            <option value="tipo">Tipo</option>
            <option value="download">Taxa Download</option>
            <option value="upload">Taxa Upload</option>
            <option value="valor">Valor</option>
          </select>
          <input type="text" name="valor">
            <button type="submit"> 
               Buscar
            </button>
            <a href="{{route('plano.index')}}">
              <button type="button">
                Limpar
              </button>
            </a>
        </form>
        </div>
        <div>
            <div>
                <br>
                <a href="{{route('plano.create')}}">
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
                    <th scope="col">Tipo</th>
                    <th scope="col">Taxa Download</th>
                    <th scope="col">Taxa Upload</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Ações</th>
                  </tr>
                </thead>
                @foreach ($planos as $item)
                <tbody>
                  <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nome}}</td>
                    <td>{{$item->tipo}}</td>
                    <td>{{$item->download}}</td>
                    <td>{{$item->upload}}</td>
                    <td>{{$item->valor}}</td>
                    <td>
                      <a href="{{route('plano.edit', $item->id)}}">
                        <button type="button">
                          Editar
                        </button>
                      </a>
                      <a href="{{route('plano.destroy', $item->id)}}">
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