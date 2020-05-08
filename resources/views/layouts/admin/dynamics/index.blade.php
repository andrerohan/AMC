@extends('layouts.admin.master.index')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Configurações</h1>
        <ol class="breadcrumb">
            <li><a href="#">Configurações</a></li>
            <li class="active"></li>
        </ol>
    </section>

    @include('flash-message')

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">

            @if($dynamics->count() > 0)

            @foreach ($dynamics as $dynamic)
            
                <div class="col-md-4">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            Detalhes {{$dynamic->first()->model}}

                            <!-- Botões Criar / Editar / Apagar-->
                                                    
                            <div class="pull-right box-tools ">
                            <form class="form-group" action="{{ route('dynamics.create')}}">
                                @csrf
                                <input type="hidden" id="model" name="model" value="{{$dynamic->first()->model}}">
                            
                                <button type="submit" class="btn btn-success btn-sm" data-widget="" data-toggle="tooltip" title="Criar">
                                    <i class="fa fa-plus"></i>
                                </button>&nbsp;
                            </form>
                            </div>
                        </div>
                    
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                
                                @foreach ($dynamic as $d)
                                <tr>
                                    <td>{{$d->nome}}</td>
                                    <td>
                                        <div class="pull-right box-tools">
                                            <a href="/admin/dynamics/{{$d->id}}/edit"><button type="button" class="btn btn-info btn-sm" data-widget="" data-toggle="tooltip" title=""><i class="fa fa-edit"></i></button></a>&nbsp;
                                            <a href="/admin/dynamics/{{$d->id}}"><button type="Submit" form="delete" class="btn btn-danger btn-sm" data-widget="" data-toggle="tooltip" title=""><i class="fa fa-trash-o"></i></button></a>
                                        
                                        <form method="POST" id="delete" action="/admin/dynamics/{{$d->id}}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                                                                
                            </table>
                        </div>
                  
                    </div>
                </div><!-- /.box -->
        
            @endforeach

            @else
            
            <div class="col-md-4">
                <div class="box box-info">
                    <div class="box-header with-border">
                        Sem Configurações criadas.

                        <!-- Botões Criar / Editar / Apagar-->
                                                
                        <div class="pull-right box-tools ">
                        <form method="GET" class="form-group" action="{{ route('dynamics.create')}}">
                                <button type="submit" class="btn btn-success btn-sm" data-widget="" data-toggle="tooltip" title="Criar">
                                    <i class="fa fa-plus"></i>
                                </button>&nbsp;
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.box -->

            @endif
        </div>
        <!-- /.col -->
    </section>
</div>


@endsection