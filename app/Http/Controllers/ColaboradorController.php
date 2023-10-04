<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use App\Models\Setor;
use Illuminate\Http\Request;

class ColaboradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colaboradores = Colaborador::all();

        return view('colaborador.list')->with(['colaboradores'=> $colaboradores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $setores = Setor::orderBy('nome')->get();

        return view('colaborador.form')->with(['setores'=> $setores]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*$request->validate([
            'nome'=>'required',
        ],[
            'nome.required'=>"O :attribute é obrigatório!",
            'nome.max'=>" Só é permitido 120 caracteres em :attribute !",
        ]); */

        $dados = ['nome'=>$request->nome,
            'funcao'=>$request->funcao,
            'setor_id'=>$request->setor_id,
        ]; 

        Colaborador::create($dados);

        return redirect('colaborador')->with('success', "Cadastrado com sucesso!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $colaborador = Colaborador::find($id); // select * from colaborador where id = $id

        $setores = Setor::orderBy('nome')->get();

        return view('colaborador.form')->with([
        'colaborador'=> $colaborador,
        'setores'=> $setores]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /*$request->validate([
            'nome'=>'required',
        ],[
            'nome.required'=>"O :attribute é obrigatório!",
            'nome.max'=>" Só é permitido 120 caracteres em :attribute !",
        ]); */

        $dados = ['nome'=>$request->nome,
            'funcao'=>$request->funcao,
            'setor_id'=>$request->setor_id,
        ]; 

        Colaborador::UpdateOrCreate(
            ['id'=>$request->id],
            $dados);

        return redirect('colaborador')->with('success', "Atualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $colaborador = Colaborador::findOrFail($id);

        $colaborador->delete();

        return redirect('colaborador')->with('success', "Deletado com sucesso!");
    }

    /**
    * Pesquisa e filtra o registro do banco de dados
     */
    public function search(Request $request)
    {
        if(!empty($request->valor)){
            $colaboradores = Colaborador::where($request->tipo, 'like', "%". $request->valor."%")->get();
        } else {
            $colaboradores = Colaborador::all();
        }
        return view('colaborador.list')->with(['colaboradores'=> $colaboradores]);
    }
}