@extends('layouts.admin.master.index')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Utilizadores

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> Utilizadores</a></li>
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
                        Lista de Utilizadores

                        <!-- Botões Criar / Editar / Apagar-->
                                                   
                        <div class="pull-right box-tools ">
                            <form class="form-group" action="{{route('users.create')}}">
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
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Cliente Associado</th>
                            </thead>
                            @if($users)
                            @foreach($users as $user)
                            <tr>
                                <td ><a href="/admin/users/{{$user->id}}">{{$user->name}}</a></td>   
                                <td >{{$user->email}}</td>
                                <td >
                                    @foreach($user->clientes()->get() as $cliente)
                                <a href="/admin/clientes/{{$cliente->id}}" type="button" class="btn btn-info btn-sm"><i class="fa fa-industry"></i>&nbsp; {{$cliente->nome}}</a>
                                    @endforeach
                                </td>
                             </tr>
                             @endforeach
                             @endif
                            
                           
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