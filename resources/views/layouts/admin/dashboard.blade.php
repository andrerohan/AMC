@extends('layouts.admin.master.index')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Painel de Controlo</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <a href="/admin/users"><span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></a></span>

                    <div class="info-box-content">
                        <span class="info-box-text">UTILIZADORES</span>
                        <span class="info-box-number">{{$users}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <a href="/admin/clientes"><span class="info-box-icon bg-orange"><i class="fa fa-industry"></i></a></span>
    
                        <div class="info-box-content">
                            <span class="info-box-text">Clientes</span>
                            <span class="info-box-number">{{$clientes}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <a href="/admin/veiculos"><span class="info-box-icon bg-red"><i class="fa fa-automobile"></i></a></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Veiculos</span>
                        <span class="info-box-number">{{$veiculos}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <a href="/admin/reparacoes"><span class="info-box-icon bg-green"><i class="fa fa-wrench"></i></a></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Reparações</span>
                        <span class="info-box-number">{{$reparacoes}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
           
        </div>
        
     
            <div class="col-md-5">

            <!-- DONUT CHART -->
                <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Veiculos por Clientes <small>(>1 veiculo)</small></h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                    <div class="box-body">
                    <canvas id="pieChart" style="height:250px"></canvas>
                    </div>
                <!-- /.box-body -->
                </div>
            <!-- /.box -->
            </div>
     
    
    </section>
    <!-- /.content -->
</div>

@endsection