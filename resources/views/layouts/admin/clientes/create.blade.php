@extends('layouts.admin.master.index')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Criar Cliente
            <small>Formulário para criação de Cliente</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-industry"></i>Clientes</a></li>
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
              <h3 class="box-title">Novo Cliente</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" class="form-group" action="{{ route('clientes.store') }}">
                @csrf
              <div class="box-body">  
                  <div class="form-group">
                      <label>Nome</label>
                      <input type="text" class="form-control" id="nome" name="nome" >
                    </div>
                    <div class="form-group">
                        <label>Contribuinte</label>
                        <input type="number" class="form-control" id="contribuinte" name="contribuinte" >
                      </div>
                    <div class="form-group">
                        <label>Morada</label>
                        <input type="text" class="form-control" id="morada" name="morada" >
                    </div>
                    <div class="form-group">
                        <label>Codigo Postal</label>
                        <input type="text" class="form-control" id="codigopostal" name="codigopostal" >
                    </div>
                    <div class="form-group">
                        <label>Localidade</label>
                        <input type="text" class="form-control" id="localidade" name="localidade" >
                    </div>
                    <div class="form-group">
                        <label>Contacto</label>
                        <input type="text" class="form-control" id="contacto" name="contacto" >
                    </div>
                    <div class="form-group">
                        <label>Observações</label>
                         <input type="text" class="form-control" id="obs" name="obs" >
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