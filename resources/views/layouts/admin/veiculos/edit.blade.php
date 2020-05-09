@extends('layouts.admin.master.index')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Editar Veiculo
            <small>Formulário para editar veiculo</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-automobile"></i>Veiculos</a></li>
            <li class="active">Editar</li>
        </ol>
    </section>

    <div class="row">
      <!-- Main content -->
      <section class="content container-fluid">
          <!-- left column -->
          <div class="col-md-4">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Editar Veiculo</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form method="POST" action="/admin/veiculos/{{$veiculo->id}}">
                @method('PUT')
                @csrf
                <input type="hidden" id="edit_veiculo" name="edit_veiculo" value="1">
                <div class="box-body">
                    <div class="form-group">
                        <label>Cliente</label>
                        <select class="js-example-basic form-control" name="cliente_id">
                        @if($veiculo->cliente)
                            @foreach($clientes as $cliente)
                                @if($cliente->id === $veiculo->cliente->id)
                                    <option selected value="{{$cliente->id}}">{{$cliente->nome}}</option>
                                @else
                                    <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                                @endif
                            @endforeach
                        @endif
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Matricula</label>
                      <input type="text" class="form-control" id="matricula" name="matricula" value="{{$veiculo->matricula}}">
                    </div>

                    <div class="form-group">
                        <label>Marca</label>
                        <input type="text" class="form-control" id="marca" name="marca" value="{{$veiculo->marca}}">
                    </div>

                    <div class="form-group">
                        <label>Modelo</label>
                        <input type="text" class="form-control" id="modelo" name="modelo" value="{{$veiculo->modelo}}">
                    </div>

                    <div class="form-group">
                        <label>Ano</label>
                        <input type="text" class="form-control" id="ano" name="ano" value="{{$veiculo->ano}}">
                    </div>

                    <div class="form-group">
                        <label>Observações</label>
                        <input type="text" class="form-control" id="obs" name="obs" value="{{$veiculo->obs}}">
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
                  <h3 class="box-title">Detalhes Veiculo</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST" action="/admin/veiculos/{{$veiculo->id}}">
                  @method('PUT')
                  @csrf
                  <input type="hidden" id="veiculo_details" name="veiculo_details" value="1">
                  <div class="box-body">

                  @foreach($dynamic as $d)

                      @foreach($veiculo_details as $details)

                        @if($d->id === $details->dynamic_id)

                        <div class="form-group">
                            <label>{{$d->nome}}</label>
                            <input type="hidden" id="detail_id[]" name="detail_id[]" value="{{$details->id}}">
                            <input type="text" class="form-control" id="detail_nome[]" name="detail_nome[]" value="{{$d->id === $details->dynamic_id ? $details->nome : ""}}">
                        </div>


                        @endif


                      @endforeach


                  @endforeach

                  </div>


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

</div>

@endsection
