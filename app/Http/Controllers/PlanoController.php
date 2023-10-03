<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plano;

class PlanoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $planos = Plano::all();

        return view('plano.list')->with(['planos'=> $planos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('plano.form');
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
            'tipo'=>$request->tipo,
            'upload'=>$request->upload,
            'download'=>$request->download,
            'valor'=>$request->valor,
        ]; 

        Plano::create($dados);

        return redirect('plano')->with('success', "Cadastrado com sucesso!");
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
        $plano = Plano::find($id); //select * from plano where id = $id

        return view('plano.form')->with([
            'plano'=> $plano,]);
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
            'tipo'=>$request->tipo,
            'upload'=>$request->upload,
            'download'=>$request->download,
            'valor'=>$request->valor,
        ]; 

        Plano::UpdateOrCreate(
            ['id'=>$request->id],
            $dados);

        return redirect('plano')->with('success', "Atualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plano = Plano::findOrFail($id);

        $plano->delete();

        return redirect('plano')->with('success', "Removido com sucesso!");
    }

    public function search(Request $request)
    {
        if(!empty($request->valor)){
            $planos = Plano::where($request->tipo, 'like', "%". $request->valor."%")->get();
        } else {
              $planos = Plano::all();
        }
        return view('plano.list')->with(['planos'=> $planos]);
    }
}
