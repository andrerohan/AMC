<?php

namespace App\Http\Controllers;

use App\Veiculo_Details;
use Illuminate\Http\Request;

class VeiculoDetailsController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Veiculo_Details  $veiculo_Details
     * @return \Illuminate\Http\Response
     */
    public function show(Veiculo_Details $veiculo_Details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Veiculo_Details  $veiculo_Details
     * @return \Illuminate\Http\Response
     */
    public function edit(Veiculo_Details $veiculo_Details)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Veiculo_Details  $veiculo_Details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Veiculo_Details $veiculo_Details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Veiculo_Details  $veiculo_Details
     * @return \Illuminate\Http\Response
     */
    public function destroy(Veiculo_Details $veiculo_Details)
    {
        //
    }
}
