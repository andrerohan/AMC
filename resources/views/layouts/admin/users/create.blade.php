@extends('layouts.admin.master.index')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Criar Utilizador
            <small>Formulário para criação de Utilizador</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i>Utilizadores</a></li>
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
              <h3 class="box-title">Novo Utilizador</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('users.store') }}">
                @csrf
              <div class="box-body">  
                <div class="form-group">
                  <label>Nome</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Exemplo: André Maia">
              </div>
              <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Exemplo: afmc89@gmail.com">
              </div>
              <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" id="password" name="password">
              </div>
                  <div class="form-group">
                  <label>Confirmação Password</label>
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
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