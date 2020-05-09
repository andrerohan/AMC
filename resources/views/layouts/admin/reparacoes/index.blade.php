@extends('layouts.admin.master.index')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Reparações</h1>
        <ol class="breadcrumb">
            <li><a href="#">Clientes</a></li>
            <li class="active"></li>
        </ol>
    </section>

    @include('flash-message')

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">


                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            Lista de Reparações
                            <!-- Botões Criar / Editar / Apagar-->

                            <div class="pull-right box-tools ">
                            <form method="" class="form-group" action="{{route('reparacoes.create')}}">
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
                                    <th>Data</th>
                                    <th>Km</th>
                                    <th>Observações</th>
                                    <th>Veiculo</th>
                                </thead>

                                @foreach($reparacoes as $r)
                                <tr>
                                    <td><a href="/admin/reparacoes/{{$r->id}}">{{$r->data}}</a></td>
                                    <td>{{$r->km}}</td>
                                    <td>{{$r->obs}}</td>
                                    <td>
                                        @if($r->veiculo)
                                            <a href="/admin/veiculos/{{$r->veiculo->id}}">{{$r->veiculo->matricula}}</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        <!-- /.box-body -->

                    </div>
                </div><!-- /.box -->

        </div>
        <!-- /.col -->
    </section>
</div>


@endsection
