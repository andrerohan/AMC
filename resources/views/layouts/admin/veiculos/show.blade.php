@extends('layouts.admin.master.index')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Veiculo

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-automobile"></i> Veiculos</a></li>
            <li class="active"></li>
        </ol>
    </section>

    @include('flash-message')

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row justify-content-center">
            
            <!-- Veiculo -->
            
            <div class="col-md-6">
                <div class="box box-success table-responsive">
                    <thead><div class="box-header with-border text-center">
                        Veiculo
                        <div class="pull-right box-tools">
                            <a href="/admin/veiculos/{{$veiculo->id}}/edit"><button type="button" class="btn btn-info btn-sm" data-widget="" data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></button></a>&nbsp;
                            <a href="/admin/veiculos/{{$veiculo->id}}"><button type="Submit" form="delete" class="btn btn-danger btn-sm" data-widget="" data-toggle="tooltip" title="Apagar"><i class="fa fa-trash-o"></i></button></a>
                        
                        <form method="POST" id="delete" name="delete" action="/admin/veiculos/{{$veiculo->id}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                        </div>
                    </div>
                    </thead>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                           
                            <tr>
                                <th>Matricula</th>
                                
                                
                                <td>{{$veiculo->matricula}}</td>
                            </tr>
                                <th>Marca</th>
                                <td>{{$veiculo->marca}}</td>
                            <tr>

                            </tr>
                                <th>Modelo</th>
                                <td>{{$veiculo->modelo}}</td>
                            <tr>

                            </tr>
                                <th>Ano</th> 
                                <td>{{$veiculo->ano}}</td>                            
                            </tr>
                            </tr>
                                <th>Observações</th> 
                                <td>{{$veiculo->obs}}</td>                            
                            </tr>
                            </tr>
                                <th>Cliente</th> 
                                <td><a href="/admin/clientes/{{$veiculo->cliente->id}}">{{$veiculo->cliente->nome}}</a></td>                            
                            </tr>                            
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

            <div class="col-md-6">
                <div class="box box-success table-responsive">
                    <div class="box-header with-border text-center">
                        Detalhes do Veiculo
                        <div class="pull-right box-tools">
                            <a href="/admin/veiculos/{{$veiculo->id}}/edit"><button type="button" class="btn btn-info btn-sm" data-widget="" data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></button></a>&nbsp;
                            <a href="/admin/veiculos/{{$veiculo->id}}"><button type="Submit" form="delete" class="btn btn-danger btn-sm" data-widget="" data-toggle="tooltip" title="Apagar"><i class="fa fa-trash-o"></i></button></a>
                        
                        <form method="POST" id="delete" name="delete" action="/admin/veiculos/{{$veiculo->id}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">

                            @if($veiculo->veiculos_details()->get())
                                @foreach ($veiculo->veiculos_details()->get() as $veiculo_details )
                                    @if($veiculo_details->dynamic->model == "Veiculo")
                                        </tr>
                                            <th>{{$veiculo_details->dynamic->nome}}</th> 
                                            <td>{{$veiculo_details->nome}}</td>                            
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            
            <!-- Reparações -->
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Reparações</h3>
                        <!-- Botões Criar / Editar / Apagar-->
                                                   
                        <div class="pull-right box-tools ">
                            <form method="GET" form-group" action="{{ route('reparacoes.create') }}">
                                <input type="hidden" name="veiculo_id" id="veiculo_id" value="{{$veiculo->id}}">      
                                <button type="submit" class="btn btn-success btn-sm" title="Criar"><i class="fa fa-plus"></i></button>&nbsp;
                            </form>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Km</th>
                                    <th>Observações</th>
                                    <th>Tipos de Reparação</th>
                                </tr>
                            </thead>
                            @foreach($veiculo->reparacoes()->orderBy('data','DESC')->get() as $reparacao)
                            <tr>
                                <td><a href="/admin/reparacoes/{{$reparacao->id}}">{{$reparacao->data}}</a></td>
                                <td>{{$reparacao->km}}</td>
                                <td>{{$reparacao->obs}}</td>
                                <td>
                                    @foreach($reparacao->details()->get() as $details)
                                        &nbsp;{{$details->dynamic->nome}}&nbsp;
                                    @endforeach
                                </td>
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