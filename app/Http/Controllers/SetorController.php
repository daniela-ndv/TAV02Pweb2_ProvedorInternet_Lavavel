<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setor;

class SetorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setores = Setor::all();

        return view('setor.list')->with(['setores'=> $setores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('setor.form');
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
            'codigo'=>$request->codigo,
            'atribuicoes'=>$request->atribuicoes,
        ]; 

        Setor::create($dados);

        return redirect('setor')->with('success', "Cadastrado com sucesso!");
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
        $setor = Setor::find($id); //select * from plano where id = $id

        return view('setor.form')->with([
            'setor'=> $setor,]);
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
            'codigo'=>$request->codigo,
            'atribuicoes'=>$request->atribuicoes,
        ]; 

        Setor::UpdateOrCreate(
            ['id'=>$request->id],
            $dados);

        return redirect('setor')->with('success', "Atualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $setor = Setor::findOrFail($id);

        $setor->delete();

        return redirect('setor')->with('success', "Removido com sucesso!");
    }

    public function search(Request $request)
    {
        if(!empty($request->valor)){
            $setores = Setor::where($request->tipo, 'like', "%". $request->valor."%")->get();
        } else {
            $setores = Setor::all();
        }
        return view('setor.list')->with(['setores'=> $setores]);
    }
}
