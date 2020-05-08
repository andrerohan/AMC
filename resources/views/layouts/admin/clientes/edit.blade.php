@extends('layouts.admin.master.index')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Editar Cliente
            <small>Formulário para editar cliente</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-industry"></i>Clientes</a></li>
            <li class="active">Editar</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="row">
        <div class="col-md-4">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Editar Cliente</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="/admin/clientes/{{$cliente->id}}">
              @method('PUT')
              @csrf
              <input type="hidden" id="edit_cliente" name="edit_cliente" value="1">
              <div class="box-body">
                <div class="form-group">
                  <label>Nome</label>
                  <input type="text" class="form-control" id="nome" name="nome" value="{{$cliente->nome}}">
                </div>
                <div class="form-group">
                  <label>Contribuinte</label>
                  <input type="number" class="form-control" id="contribuinte" name="contribuinte" value="{{$cliente->contribuinte}}">
                </div>
                <div class="form-group">
                  <label>Morada</label>
                  <input type="text" class="form-control" id="morada" name="morada" value="{{$cliente->morada}}">
                </div>
                <div class="form-group">
                  <label>Codigo Postal</label>
                  <input type="text" class="form-control" id="codigopostal" name="codigopostal" value="{{$cliente->codigopostal}}">
                </div>
                <div class="form-group">
                  <label>Localidade</label>
                  <input type="text" class="form-control" id="localidade" name="localidade" value="{{$cliente->localidade}}">
                </div>
                <div class="form-group">
                  <label>Contacto</label>
                  <input type="text" class="form-control" id="contacto" name="contacto" value="{{$cliente->contacto}}">
                </div>
                <div class="form-group">
                  <label>Observações</label>
                  <input type="text" class="form-control" id="obs" name="obs" value="{{$cliente->obs}}">
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
        <div class="col-md-4">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Associar Utilizadores</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->

              <form method="POST" action="/admin/clientes/{{$cliente->id}}">
                @method('PUT')
                @csrf
                <input type="hidden" id="update_user" name="update_user" value="1">
                <div class="box-body">
                    <div class="form-group">
                        <label>Associar Utilizadores</label>
                        <select class="js-example-basic-multiple form-control" name="users[]" multiple="multiple">
                        @foreach($users as $user)
                          @if($user->clientes()->where('id',$cliente->id)->exists())
                            <option selected type="button" class="btn btn-primary" value="{{$user->id}}">{{$user->name}}</option>
                          @else
                            <option value="{{$user->id}}">{{$user->name}}</option  >
                          @endif
                        @endforeach
                      </select>
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
        </section>
    <!-- /.content -->
</div>

@endsection