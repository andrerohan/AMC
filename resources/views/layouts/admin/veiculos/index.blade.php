@extends('layouts.admin.master.index')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Veiculos

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-automobile"></i> Veiculos</a></li>
            <li class="active"></li>
        </ol>
    </section>

    @include('flash-message')

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info table-responsive">
                    <div class="box-header with-border">
                        Lista de Veiculos

                        <!-- Botões Criar / Editar / Apagar-->

                        <div class="pull-right box-tools ">
                            <form method="" class="form-group" action="{{ route('veiculos.create') }}">
                                <button type="submit" class="btn btn-success btn-sm" data-widget="" data-toggle="tooltip" title="Criar">
                                    <i class="fa fa-plus"></i>
                                </button>&nbsp;
                            </form>
                        </div>


                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <th>Matricula</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Ano</th>
                                <th>Observações</th>
                                <th>Cliente</th>
                            </thead>
                            @foreach($veiculos as $v)
                            <tr>
                                <td ><a href="/admin/veiculos/{{$v->id}}">{{$v->matricula}}</a></td>
                                <td>{{$v->marca}}</td>
                                <td>{{$v->modelo}}</td>
                                <td>{{$v->ano}}</td>
                                <td>{{$v->obs}}</td>
                                <td><a href="/admin/clientes/{{$v->cliente_id}}">{{$v->cliente->nome}}</a></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <li><a href="#">&laquo;</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- /.box -->
        </div>
        <!-- /.col -->
    </section>
</div>


@endsection
