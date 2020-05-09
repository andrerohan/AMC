@extends('layouts.admin.master.index')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Editar Reparação
            <small>Formulário para editar Reparação</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-gears"></i>Reparações</a></li>
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
              <h3 class="box-title">Editar Reparação</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" class="form-group" action="/admin/reparacoes/{{$reparacao->id}}">
              @method('PUT')
              @csrf
              <div class="box-body">

              <input type="hidden" id="reparacao_id" name="reparacao_id" value="{{$reparacao->id}}">

                <div class="form-group">
                  <label>Data:</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker" name="data" value="{{Carbon\Carbon::parse($reparacao->data)->isoFormat('DD/MM/YYYY')}}">
                  </div>
                  <!-- /.input group -->
                </div>
              </div>


              <div class="form-group">
                <label for="exampleInputEmail1">Km</label>
                <input type="number" min="0.00"  step="0.01" class="form-control" id="km" name="km" value="{{$reparacao->km}}">
              </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Observações</label>
                    <input type="text" class="form-control" id="obs" name="obs" value="{{$reparacao->obs}}">
                  </div>



                  <div class="form-group">
                    <label>Veiculo</label>
                    <select class="js-example-basic form-control" name="veiculo_id">

                    @if($reparacao->veiculo)
                        <option selected value="{{$reparacao->veiculo->id}}">{{$reparacao->veiculo->matricula}}</option>
                    @endif


                    @foreach($veiculos as $veiculo)
                        <option value="{{$veiculo->id}}">{{$veiculo->matricula}}</option>
                    @endforeach
                  </select>
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
