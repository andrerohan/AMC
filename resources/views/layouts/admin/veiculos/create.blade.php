@extends('layouts.admin.master.index')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Criar Veiculo
            <small>Formulário para criação de veiculo</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-automobile"></i>Veiculos</a></li>
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
              <h3 class="box-title">Novo Veiculo</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" class="form-group" action="{{ route('veiculos.store')}}">
                @csrf
              <div class="box-body">
                
                 <div class="form-group">
                    
                    <label>Cliente</label>
                    <select class="js-example-basic form-control" name="cliente_id">
                    
                    @if(!$cliente_)

                      <option>Selecione um ...</option>

                    @endif    

                    @foreach($clientes as $cliente)                 

                      @if($cliente->id == $cliente_)
                    
                        <option selected value="{{$cliente->id}}">{{$cliente->nome}}</option>
                    
                      @else 

                        <option value="{{$cliente->id}}">{{$cliente->nome}}</option>

                      @endif
                    
                    @endforeach
                  </select>
                </div> 
                
                <div class="form-group">
                  <label>Matricula</label>
                  <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Exemplo: 02-04-XB">
                </div>
                
                <div class="form-group">
                    <label>Marca</label>
                    <input type="text" class="form-control" id="marca" name="marca" placeholder="Exemplo: Renault">
                </div>
                
                <div class="form-group">
                    <label>Modelo</label>
                    <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Exemplo: Clio">
                </div>
                
                <div class="form-group">
                    <label>Ano</label>
                    <input type="text" class="form-control" id="ano" name="ano" placeholder="Exemplo: 2019">
                </div>
                
                <div class="form-group">
                    <label>Observações</label>
                    <input type="text" class="form-control" id="obs" name="obs">
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