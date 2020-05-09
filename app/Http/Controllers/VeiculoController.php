<?php

namespace App\Http\Controllers;

use App\Veiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
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
        $veiculos = Veiculo::get();

        return view('layouts.admin.veiculos.index', compact('veiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $clientes = \App\Cliente::all();

        //cliente.show - ao clicar em adicionar veiculo tem input cliente_id
        $cliente_ = $request->cliente_id;



        return view('layouts.admin.veiculos.create', compact('clientes', 'cliente_'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /*{
            "_token": "FICUBo9YpHwfROdbAP8wEegDvZKbzthpHAIQxPSN",
            "matricula": "02-02-ol",
            "marca": "coiso",
            "modelo": "coiso",
            "ano": "2019",
            "obs": "teste"
        }*/

        $this->validate($request, [
            'matricula' => 'required|min:3|max:50',
        ]);

        try {

            $veiculo = new Veiculo();

            $veiculo = Veiculo::create([
                'matricula'       => $request->matricula,
                'marca'       => $request->marca,
                'modelo'       => $request->modelo,
                'ano'       => $request->ano,
                'obs'       => $request->obs,
                'cliente_id' => $request->cliente_id

            ]);


        } catch (\Exception $e) {
            return $e;
        }

        $dynamic = \App\Dynamic::where('model','Veiculo')->get();
        foreach($dynamic as $d){
            \App\Veiculo_Details::create([
                'veiculo_id' => $veiculo->id,
                'dynamic_id' => $d->id
            ]);
        }

        session()->flash(
            'success',
            'Veiculo com a matricula ' . $request->matricula . ' criado com sucesso!'
        );

        return redirect('/admin/veiculos/' . $veiculo->id);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Veiculo  $veiculo
     * @return \Illuminate\Http\Response
     */
    public function show(Veiculo $veiculo)
    {
        return view('layouts.admin.veiculos.show', compact('veiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Veiculo  $veiculo
     * @return \Illuminate\Http\Response
     */
    public function edit(Veiculo $veiculo)
    {

        $clientes = \App\Cliente::withTrashed()->get();
        $veiculo_details = \App\Veiculo_Details::withTrashed()->where('veiculo_id',$veiculo->id)->get();
        $dynamic = \App\Dynamic::where('model', 'Veiculo')->get();

        return view('layouts.admin.veiculos.edit', compact('clientes','veiculo','veiculo_details', 'dynamic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Veiculo  $veiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Veiculo $veiculo)
    {
        //return $request;

        if($request->veiculo_details){

           /* {
               {
                "_method": "PUT",
                "_token": "MxFRqmSohlvH139719wx3o8qK0ve8cZmzGbUG8dv",

                "veiculo_details": "1",

                "detail_id": [
                    "1",
                    "2"
                ],

                "detail_dynamic_id": [
                    "1",
                    "2"
                ],

                "detail_nome": [
                    "1000",

                ]
                }
            }*/

            //return $details = \App\Veiculo_Details::find($request->detail_id[0]);

            for ($i=0; $i < count($request->detail_id) ; $i++)
            {
                if($request->detail_nome[$i] !== null){

                    $details = \App\Veiculo_Details::find($request->detail_id[$i]);
                    $details->update([
                        'nome' => $request->detail_nome[$i],
                    ]);

                }

            }


            session()->flash(
                'success',
                ' Detalhes atualizados com sucesso!'
            );


            return redirect('/admin/veiculos/'.$veiculo->id);



        }

        if($request->edit_veiculo){

            /*
            {
                "_method": "PUT",
                "_token": "FICUBo9YpHwfROdbAP8wEegDvZKbzthpHAIQxPSN",
                "edit_veiculo": "1",
                "cliente_id": "5",
                "matricula": "XX-01-02",
                "marca": "Renault",
                "modelo": "Clio",
                "ano": "2019",
                "obs": "tacos no motor devem ser substituidos"
            }
            */

            $this->validate($request, [

                'matricula' => 'required',

            ]);

            $veiculo->update([
                'matricula' => $request->matricula,
                'marca' => $request->marca,
                'modelo' => $request->modelo,
                'ano' => $request->ano,
                'cliente_id' => $request->cliente_id,
                'obs' => $request->obs,

            ]);

            session()->flash(
                'success',
                'Veiculo com a matricula ' . $request->matricula . ' atualizado com sucesso!'
            );

            return redirect('/admin/veiculos/'.$veiculo->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Veiculo  $veiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Veiculo $veiculo)
    {

        session()->flash(
            'error',
            'Veiculo com a matricula ' . $veiculo->matricula . ' foi apagado!'
        );
        $veiculo->delete();

        return redirect('/admin/veiculos');
    }
}
