<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function admin()
    {


    $clientes = \App\Cliente::count();
        $users = \App\User::count();
        $veiculos = \App\Veiculo::count();
        $reparacoes = \App\Reparacao::count();


        // Grafico no DashBoard
        $clients = \App\Cliente::get();
        $veiculos_cliente = \App\Veiculo::get();


        $color = [
            '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc',
            '#FF6633', '#FFB399', '#FF33FF', '#FFFF99', '#00B3E6',
            '#E6B333', '#3366E6', '#999966', '#99FF99', '#B34D4D',
            '#80B300', '#809900', '#E6B3B3', '#6680B3', '#66991A',
            '#FF99E6', '#CCFF1A', '#FF1A66', '#E6331A', '#33FFCC',
            '#66994D', '#B366CC', '#4D8000', '#B33300', '#CC80CC',
            '#66664D', '#991AFF', '#E666FF', '#4DB3FF', '#1AB399',
            '#E666B3', '#33991A', '#CC9999', '#B3B31A', '#00E680',
            '#4D8066', '#809980', '#E6FF80', '#1AFF33', '#999933',
            '#FF3380', '#CCCC00', '#66E64D', '#4D80CC', '#9900B3',
            '#E64D66', '#4DB380', '#FF4D4D', '#99E6E6', '#6666FF'];

        $PieData_ = array();

        foreach ($clients as $client) {


            if(empty($PieData_)){
                if($client->veiculos()->count() > 1){
                   $i = Arr::random($color);
                    $PieData_ =  (
                        [
                            [ 'value' => $client->veiculos()->count(),
                            'color' => $i,
                            'highlight' => $i,
                            'label' => $client->nome
                            ]
                        ]);
                }
            }
            else
            {
                if($client->veiculos()->count() > 1){
                    $i = Arr::random($color);
                    array_push($PieData_ ,

                            [ 'value' => $client->veiculos()->count(),
                              'color' => $i,
                              'highlight' => $i,
                              'label' => $client->nome
                            ]
                        );

                }
            }



        }

       $data =  json_encode($PieData_);

        return view('layouts.admin.dashboard', compact('clientes','users','veiculos','reparacoes', 'data'));
    }
}
