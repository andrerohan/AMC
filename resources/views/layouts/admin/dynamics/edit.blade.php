@extends('layouts.admin.master.index')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Editar Configuração
            <small>Formulário para editar Configuração</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-gears"></i>Configuração</a></li>
            <li class="active">Editar</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="row">
        <!-- left column -->
        <div class="col-md-4">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Editar Configuração</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="/admin/dynamics/{{$dynamic->id}}">
              @method('PUT')
              @csrf
                <div class="box-body">  
                    <div class="form-group">
                      <label>Selecionar Modelo</label>
                      <select class="form-control" disabled>
                      <option value="{{$dynamic->model}}">{{$dynamic->model}}</option>
                    
                      </select>
                    </div>
                  </div>
                  <div class="box-body">  
                    <div class="form-group">
                      <label>Nome</label>
                      <input type="text" class="form-control" id="nome" name="nome" value="{{$dynamic->nome}}">
                    </div>
                  </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success">Guardar</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        </div>
        </section>
    <!-- /.content -->
</div>

@endsection