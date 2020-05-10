@extends('layouts.admin.master.index')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Clientes</h1>
        <ol class="breadcrumb">
            <li><a href="#">Clientes</a></li>
            <li class="active"></li>
        </ol>
    </section>

    @include('flash-message')

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="box table-responsive">
                    <div class="box-header">

                        <h3 class="box-title">Lista de Clientes</h3>

                        <div class="pull-right box-tools ">
                            <form method="" class="form-group" action="{{route('clientes.create')}}">
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
                            <tr>
                                <th>Nome</th>
                                <th>Contribuinte</th>
                                <th>Morada</th>
                                <th>Codigo Postal</th>
                                <th>Localidade</th>

                            </tr>
                            </thead>
                            <tbody>
                                @foreach($clientes as $cliente)
                                <tr>
                                    <td ><a href="/admin/clientes/{{$cliente->id}}">{{$cliente->nome}}</a></td>
                                    <td >{{$cliente->contribuinte}}</td>
                                    <td >{{$cliente->morada}}</td>
                                    <td >{{$cliente->codigopostal}}</td>
                                    <td >{{$cliente->localidade}}</td>

                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>

</div>

@endsection
