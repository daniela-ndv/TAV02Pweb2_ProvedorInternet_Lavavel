@extends('base.app')
@section("titulo", 'Listagem de Colaboradores')
@section('content')

    <h3 class="pt-4 text-2xl font-medium py-4">Listagem de Colaboradores</h3> <br>
    <div class="flex">
        <div class="w-5/6">
            <form action="{{ route('colaborador.search') }}" method="post">
                @csrf
                <p>Filtrar por: </p>
                <select name="tipo">
                    <option value="nome">Nome</option>
                    <option value="funcao">Função</option>
                    <option value="setor_id">Porte</option>
                </select>
                <input type="text" name="valor">
                    <button
                        type="submit"
                        class="inline-block rounded border-2 border-slate-300 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:border-slate-300 hover:bg-neutral-300 hover:text-primary-600 focus:border-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:border-primary-700 active:text-primary-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10">
                        Buscar
                    </button>
                    <a href="{{route('colaborador.index')}}">
                        <button
                        type="button"
                        class="inline-block rounded border-2 border-slate-300 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:border-slate-300 hover:bg-neutral-300 hover:text-primary-600 focus:border-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:border-primary-700 active:text-primary-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10">
                        Limpar
                        </button>
                    </a>
            </form>
        </div>
        <div class="w-1/6 flex grid content-center float-right">
            <div>
                <br>
                <a href="{{route('colaborador.create')}}">
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
                    <th scope="col">Função</th>
                    <th scope="col">Setor</th>
                  </tr>
                </thead>
                @foreach ($colaboradores as $item)
                <tbody>
                  <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nome}}</td>
                    <td>{{$item->funcao}}</td>
                    <td>{{$item->setor->nome ?? ""}}</td>
                    <td>
                        <a href="{{route('colaborador.edit', $item->id)}}">
                            <button
                            type="button">
                            Editar
                            </button>
                        </a>
                        <a href="{{route('colaborador.destroy', $item->id)}}">
                            <button
                            onclick="return confirm('Deseja excluir o registro?')">
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