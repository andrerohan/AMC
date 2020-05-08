@extends('layouts.admin.master.index')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Criar Reparação
            <small>Formulário para criação de Reparação</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-gears"></i>Reparação</a></li>
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
              <h3 class="box-title">Nova Reparação</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" class="form-group" action="{{route('reparacoes.store')}}">
                @csrf
              <div class="box-body">  
                                
                <div class="form-group">
                  <label>Data:</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker" id="data" name="data" value="{{Carbon\Carbon::today()->isoFormat('DD-MM-YYYY')}}">
                  </div>
                  <!-- /.input group -->
                </div>

                <div class="form-group">
                  <label>km:</label>
                  <input type="number" min="0.00"  step="0.01" class="form-control" id="km" name="km" placeholder="">
                </div>
               
                 <div class="form-group">
                    <label>Observações</label>
                    <input type="text" class="form-control" id="obs" name="obs" placeholder="Revisão dos 1000">
                </div>
              
              <div class="form-group">
                  <label>Veiculo</label>
                  <select class="js-example-basic form-control" name="veiculo_id">
                    @if(!$veiculo_)

                      <option value="">Selecione um ...</option>

                    @endif 
                  @foreach($veiculos as $veiculo)
                    @if($veiculo->id == $veiculo_)  
                      <option selected value="{{$veiculo->id}}">{{$veiculo->matricula}}</option>
                    @else
                      <option value="{{$veiculo->id}}">{{$veiculo->matricula}}</option>
                    @endif
                    @endforeach
                </select>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success">Guardar</button>
              </div>
              </div>
            
            </form>
          </div>
        </div>
      </div>
  </section>
    <!-- /.content -->
</div>

@endsection