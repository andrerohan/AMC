@extends('layouts.admin.master.index')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Configurações
            <small>Criação de Configurações</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-gears"></i>Configurações</a></li>
            <li class="active">Criar</li>
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
              <h3 class="box-title">Novo Configuração</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <form method="POST" class="form-group" action="{{ route('dynamics.store')}}">
                @csrf

              <div class="box-body">
                <div class="form-group">
                  <label>Selecionar Modelo</label>
                  <select class="form-control" id="model" name="model">
                    @if($dynamic_model)
                    <option>{{$dynamic_model}}</option>
                    @endif
                    <option>Veiculo</option>
                    <option>Reparacao</option>
                  </select>
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label>Nome</label>
                  <input type="text" class="form-control" id="nome" name="nome" placeholder="">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success">Guardar</button>
              </div>

            </form>
          </div>
        </div>
      </div>
  </section>
    <!-- /.content -->
</div>

@endsection


