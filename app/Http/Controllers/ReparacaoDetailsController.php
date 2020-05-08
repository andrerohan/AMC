<?php

namespace App\Http\Controllers;

use App\Reparacao_Details;
use Illuminate\Http\Request;

class ReparacaoDetailsController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //return $request;

        /*{
            "_token": "vNUyMrTvwK43diXUH0Bj9CwzMY4Vz6ewvLY7RcDG",
            "dynamic_id": "6",
            "nome": "Cátia Coelho",
            "qtd": "1",
            "preco": "1"
        }*/

        

        $this->validate($request, [
            'dynamic_id' => 'required',
            'preco' => 'required',
            'qtd' => 'required',
            'nome' => 'required',
            'reparacao_id' => 'required',
            
        ]);

      

        try {

            $detalhe = new Reparacao_Details();

            $detalhe = Reparacao_Details::create([
                'reparacao_id' => $request->reparacao_id,
                'dynamic_id' => $request->dynamic_id,
                'nome'       => $request->nome,
                'qtd'       => $request->qtd,
                'preco'       => $request->preco,             
            ]);

            
        } catch (\Exception $e) {
            return $e;
        }

        session()->flash(
            'success',
            'Delhate criado com sucesso!'
        );

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reparacao_Details  $reparacao_Details
     * @return \Illuminate\Http\Response
     */
    public function show(Reparacao_Details $reparacao_Details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reparacao_Details  $reparacao_Details
     * @return \Illuminate\Http\Response
     */
    public function edit(Reparacao_Details $reparacao_Details)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reparacao_Details  $reparacao_Details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reparacao_Details $reparacao_Details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reparacao_Details  $reparacao_Details
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detalhe= Reparacao_Details::find($id);

        session()->flash(
            'error',
            'Detalhe da Reparação foi apagada!'
        );

        $detalhe->delete();
        return back();
    }
}
