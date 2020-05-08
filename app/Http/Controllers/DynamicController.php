<?php

namespace App\Http\Controllers;

use App\Dynamic;
use Illuminate\Http\Request;

class DynamicController extends Controller
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
        $dynamics = Dynamic::get()->groupby('model');

        //return $dynamics->first();

        return view('layouts.admin.dynamics.index', compact('dynamics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $dynamic_model = $request->model;
        return view('layouts.admin.dynamics.create', compact('dynamic_model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'nome' => 'required',
            'model' => 'required',
            
        ]);
        
        
        $dynamic = new Dynamic();

        $dynamic = Dynamic::create([
            'nome'       => $request->nome,
            'model'       => $request->model,
           
        ]);

        $veiculos = \App\Veiculo::all();
        $details = \App\Veiculo_Details::all();


        foreach($veiculos as $veiculo){
            \App\Veiculo_Details::create([
                'dynamic_id' => $dynamic->id,
                'veiculo_id' => $veiculo->id
            ]);
        }
               

        session()->flash(
            'success',
            'Criado o nome ' . $request->nome . ' do modelo ' . $request->model 
        );

        return redirect('/admin/dynamics');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dynamic  $dynamic
     * @return \Illuminate\Http\Response
     */
    public function show(Dynamic $dynamic)
    {
        return view('layouts.admin.dynamics.show', compact('dynamic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dynamic  $dynamic
     * @return \Illuminate\Http\Response
     */
    public function edit(Dynamic $dynamic)
    {
        return view('layouts.admin.dynamics.edit', compact('dynamic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dynamic  $dynamic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dynamic $dynamic)
    {
        
        $this->validate($request, [

            'nome' => 'required',
            
        ]);
        
        $dynamic->update([
            'nome' => $request->nome,
            
        ]);

        session()->flash(
            'success',
            'Nome do Modelo ' . $dynamic->model . ' atualizado para ' . $request->nome
        );

        return redirect('/admin/dynamics');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dynamic  $dynamic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dynamic $dynamic)
    {

        session()->flash(
            'error',
            $dynamic->nome . ' do modelo ' . $dynamic->model . ' foi apagado!'
        );

        $dynamic->delete();
        return back();
    }
}
