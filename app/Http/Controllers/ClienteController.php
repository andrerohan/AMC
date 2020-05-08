<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {

        $clientes = Cliente::orderby('nome')->get();

        return view('layouts.admin.clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.clientes.create');
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
            "_token": "UO1LxYrnQF5f98COAoVHUiqNM7HOK9lEjSXAfPJK",
            "nome": "Cátia Coelho",
            "contribuinte": "123456",
            "morada": "Rua Nova arruamento nº 80B 7E Tras",
            "codigopostal": "3700-199",
            "localidade": "São João da MAdeira",
            "contacto": "1246656565",
            "obs": "9999999999999"
        }*/

        //return $request;
        $this->validate($request, [
            'nome' => 'required|min:3|max:50',
        ]);

        try {

            $cliente = new Cliente();

            $cliente = Cliente::create([
                'nome'       => $request->nome,
                'contribuinte'       => $request->contribuinte,
                'morada'       => $request->morada,
                'codigopostal'       => $request->codigopostal,
                'localidade'       => $request->localidade,
                'contacto'       => $request->contacto,
                'obs'       => $request->obs,
               
            ]);

            
        } catch (\Exception $e) {
            return $e;
        }

        session()->flash(
            'success',
            'Cliente ' . $request->nome . ' criado com sucesso!'
        );

        return redirect('/admin/clientes');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {   
        return view('layouts.admin.clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        $users = \App\User::orderby('name')->get();

        return view('layouts.admin.clientes.edit', compact('cliente','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
              
        
        if($request->update_user){

            /* 
            {
                "_method": "PUT",
                "_token": "jdJpATvbmytJItTrQsw52ypYyznE2MYh3gtYJSTd",
                "update_user": "1",
                "users": ["3"]
            }
            
            */

            $this->validate($request, [

                'users' => 'required',
                
            ]);

            $cliente->users()->sync($request->users);

            session()->flash(
                'success',
                'Utilizadores associados com sucesso!'
            );

            return redirect('/admin/clientes/'.$cliente->id);

            

        }

        if($request->edit_cliente){

            
            /* Exemplo de um request editar cliente (edit_cliente = 1)
        
            "_method": "PUT",
            "_token": "jdJpATvbmytJItTrQsw52ypYyznE2MYh3gtYJSTd",
            "edit_cliente": "1",   
            "nome": "Keebler-Osinski",
            "contribuinte": "9958452853",
            "morada": "72584 Eleonore FD 67336-2939",
            "codigopostal": "32001",
            "localidade": "Taiwan",
            "contacto": "+1-838-358-5227",
            "obs": "Blanditiis numquam deserunt architecto debitis."
            
            */

            $this->validate($request, [

                'nome' => 'required',
                
            ]);
            
            $cliente->update([
                'nome' => $request->nome,
                'contribuinte' => $request->contribuinte,
                'morada' => $request->morada,
                'codigopostal' => $request->codigopostal,
                'localidade' => $request->localidade,
                'contacto' => $request->contacto,
                'obs' => $request->obs,
                
            ]);

            session()->flash(
                'success',
                'Cliente ' . $request->nome . ' atualizado com sucesso!'
            );

            return redirect('/admin/clientes/'.$cliente->id);

        }

        

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        session()->flash(
            'error',
            'Cliente ' . $cliente->nome . ' foi apagado!'
        );
        $cliente->delete();
        return redirect('/admin/clientes');
    }
}
