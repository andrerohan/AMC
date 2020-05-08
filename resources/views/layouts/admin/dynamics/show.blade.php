@extends('layouts.admin.master.index')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Configuração

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-gears"></i> Configuração</a></li>
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
                <div class="box box-success">
                    <div class="box-header with-border text-center">
                            Configuração
                        <div class="pull-right box-tools">
                            <a href="/admin/dynamics/1/edit"><button type="button" class="btn btn-info btn-sm" data-widget="" data-toggle="tooltip" title=""><i class="fa fa-edit"></i></button></a>&nbsp;
                            <a href="#"><button type="button" class="btn btn-danger btn-sm" data-widget="" data-toggle="tooltip" title=""><i class="fa fa-trash-o"></i></button></a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                           
                            <tr>
                                <th>Modelo</th>
                                <td>Veiculo</td>
                            </tr>
                            <tr>
                                <th>Nome</th>
                                <td>Kms</td>
                            </tr>
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