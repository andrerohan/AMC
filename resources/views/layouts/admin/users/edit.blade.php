@extends('layouts.admin.master.index')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Editar Utilizador
            <small>Formulário para editar Utilizador</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i>Utilizadores</a></li>
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
              <h3 class="box-title">Editar Nome</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
          <form method="POST" action="/admin/users/{{$user->id}}">
                @method('PUT')
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label>Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
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
                <h3 class="box-title">Editar Password</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form method="POST" action="/admin/users/{{$user->id}}">
                @method('PUT')
                @csrf
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nova Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Confirmar Nova Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="">
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
                <h3 class="box-title">Editar Avatar</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form enctype="multipart/form-data" method="POST" action="/admin/users/{{$user->id}}">
                @method('PUT')
                @csrf
                <div class="box-body">
                  <div class="form-group">
                    <img class="profile-user-img img-responsive img-circle" src="{{$user->avatar}}" alt="User profile picture">

                    <label for="exampleInputEmail1">Imagem Perfil</label>
                    <input type="file" class="form-control" id="avatar" name="avatar">
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
