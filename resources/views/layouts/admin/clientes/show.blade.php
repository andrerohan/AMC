@extends('layouts.admin.master.index')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cliente

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-industry"></i> Clientes</a></li>
            <li class="active"></li>
        </ol>
    </section>

    @include('flash-message')

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row justify-content-center">
            
            <!-- Cliente -->
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="box box-success table-responsive">
                    <div class="box-header with-border text-center">
                            {{$cliente->nome}}
                        <div class="pull-right box-tools">
                            <a href="/admin/clientes/{{$cliente->id}}/edit"><button type="button" class="btn btn-info btn-sm" data-widget="" data-toggle="tooltip" title=""><i class="fa fa-edit"></i></button></a>&nbsp;
                            <a href="/admin/clientes/{{$cliente->id}}"><button type="Submit" form="delete" class="btn btn-danger btn-sm" data-widget="" data-toggle="tooltip" title=""><i class="fa fa-trash-o"></i></button></a>
                        
                        <form method="POST" id="delete" action="/admin/clientes/{{$cliente->id}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                           
                            <tr>
                                <th>Nome</th>
                                <td>{{$cliente->nome}}</td>
                            </tr>
                            <tr>
                                <th>Contribuinte</th>
                                <td>{{$cliente->contribuinte}}</td>
                            </tr>
                            <tr>
                                <th>Morada</th>
                                <td>{{$cliente->morada}}</td>
                            </tr>
                            <tr>
                                <th>Codigo Postal</th>
                                <td>{{$cliente->codigopostal}}</td>
                            </tr>
                            <tr>
                                <th>Localidade</th>
                                <td>{{$cliente->localidade}}</td>
                            </tr>
                            <tr>
                                <th>Contacto</th>
                                <td>{{$cliente->contacto}}</td>
                            </tr>
                            <tr>
                                <th>Observações</th>
                                <td>{{$cliente->obs}}</td>
                            </tr>
                            <tr>
                                <th>Utilizadores Associados</th>
                                <td>
                            @foreach($cliente->users()->orderby('name')->get() as $user)
                                    
                                <span>{{$user->name}},&nbsp; </span>
                            @endforeach
                                </td>
                            </tr>        
                      </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
           
        </div>
        <div class="row justify-content-center">    
            <!-- Veiculos -->
            <div class="col-md-12">
                <div class="box table-responsive">
                    <div class="box-header with-border">
                        Veiculos

                        <div class="pull-right box-tools ">
                            <form method="" class="form-group" action="{{ route('veiculos.create') }}">
                                <input type="hidden" id="cliente_id" name="cliente_id" value="{{$cliente->id}}">
                                <button type="submit" class="btn btn-success btn-sm" data-widget="" data-toggle="tooltip" title="Criar"><i class="fa fa-plus"></i>
                                </button>&nbsp;
                            </form>
                        </div>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Matricula</th>
                                    <th class="text-center">Marca</th>
                                    <th class="text-center">Modelo</th>
                                    <th class="text-center">Ano</th>
                                    <th class="text-center">Reparações</th>
                                    <th class="text-center">Observações</th>
                                </tr>
                            </thead>
                            @foreach($cliente->veiculos()->get() as $veiculo)
                            <tr>
                                <td class="text-center"><a href="/admin/veiculos/{{$veiculo->id}}">{{$veiculo->matricula}}</a></td>
                                <td class="text-center">{{$veiculo->marca}}</td>
                                <td class="text-center">{{$veiculo->modelo}}</td>
                                <td class="text-center">{{$veiculo->ano}}</td>
                                <td class="text-center">{{$veiculo->reparacoes()->count()}}</td>
                                <td class="text-center">{{$veiculo->obs}}</td>
                            </tr>
                            @endforeach

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        
        <!-- /.row -->
    </section>
    <!-- /.content -->


</div>

@endsection