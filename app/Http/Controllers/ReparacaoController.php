<?php

namespace App\Http\Controllers;

use App\Reparacao;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReparacaoController extends Controller
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
        $reparacoes = Reparacao::orderby('data','desc')->get();

        return view('layouts.admin.reparacoes.index',compact('reparacoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $veiculo_ = $request->veiculo_id;
        $veiculos = \App\Veiculo::all();
        return view('layouts.admin.reparacoes.create', compact('veiculo_','veiculos'));
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
            "_method": "PUT",
            "_token": "fl3FZAYjseZpvFSVZTooZbnFAOVcuTlia69DWsY8",
            "data": "5/12/2018",
            "obs": "Tempora est quam eaque pariatur.",
            "veiculo_id": "29"
        }*/

        // Transforma String data em Datetime data
        //Carbon::createFromFormat('d/m/Y', $request->data)->toDateTimeString();
        
        //return $request;

        $this->validate($request, [
            'data' => 'required',
            'veiculo_id' => 'required',
            'km' => 'required',
        ]);

        // se data tiver / altera para -
        $request->data = str_replace("/", "-", $request->data);

        try {

            $reparacao = new Reparacao();

            $reparacao = Reparacao::create([
                'data'       => Carbon::createFromFormat('d-m-Y', $request->data),
                'obs'       => $request->obs,
                'veiculo_id'       => $request->veiculo_id,  
                'km'       => $request->km,              
            ]);

            
        } catch (\Exception $e) {
            return $e;
        }

        session()->flash(
            'success',
            'Reparacao com data de ' . $reparacao->data->toDateString() . ' criada com sucesso!'
        );

        return redirect('/admin/reparacoes/'. $reparacao->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reparacao  $reparacao
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reparacao = Reparacao::find($id);
        $dynamic = \App\Dynamic::select('nome','id')->where('model','Reparacao')->get();
        $total = 0;
        return view('layouts.admin.reparacoes.show', compact('reparacao','dynamic', 'total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reparacao  $reparacao
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reparacao = Reparacao::find($id);
        $veiculos = \App\Veiculo::all();
        return view('layouts.admin.reparacoes.edit', compact('reparacao','veiculos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reparacao  $reparacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        /*{
            "_method": "PUT",
            "_token": "fl3FZAYjseZpvFSVZTooZbnFAOVcuTlia69DWsY8",
            "data": "20/11/2019",
            "obs": "04-02-XB",
            "veiculo_id": "3"
        }*/
        
        $reparacao = Reparacao::find($request->reparacao_id);
        
        $this->validate($request, [
            'data' => 'required',
            'veiculo_id' => 'required',
            'km' => 'required',
        ]);

        // se data tiver / altera para -
        $request->data = str_replace("/", "-", $request->data);



        $reparacao->update([
            'data'       => Carbon::createFromFormat('d-m-Y', $request->data),
            'obs'       => $request->obs,
            'veiculo_id'       => $request->veiculo_id,   
            'km'       => $request->km,            
        ]);

            
    

        session()->flash(
            'success',
            'Reparacao editada com sucesso!'
        );

        return redirect('/admin/reparacoes/'. $reparacao->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reparacao  $reparacao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $reparacao = Reparacao::find($id);

        session()->flash(
            'error',
            'Reparação foi apagada!'
        );

        $reparacao->delete();
        return redirect('/admin/reparacoes');
    }
}
