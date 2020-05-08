@extends('layouts.admin.master.index')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Reparação

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-gears"></i> Reparações</a></li>
            <li class="active"></li>
        </ol>
    </section>

    @include('flash-message')

    <!-- Main content -->
    <section class="content container-fluid">
        
        <div class="row justify-content-center">
            
            <!-- Reparação -->
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="box box-success table-responsive">
                <div class="box-header with-border text-center">
                    Reparação
                    <div class="pull-right box-tools">
                        <a href="/admin/reparacoes/{{$reparacao->id}}/edit"><button type="button" class="btn btn-info btn-sm" data-widget="" data-toggle="tooltip" title=""><i class="fa fa-edit"></i></button></a>&nbsp;
                        <a href="/admin/reparacoes/{{$reparacao->id}}"><button type="Submit" form="delete" class="btn btn-danger btn-sm" data-widget="" data-toggle="tooltip" title=""><i class="fa fa-trash-o"></i></button></a>
                        
                        <form method="POST" id="delete" action="/admin/reparacoes/{{$reparacao->id}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                    </div>
                    
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Data</th>
                                <td>{{$reparacao->data}}</td>
                            </tr>

                            <tr>
                                <th>Km</th>
                                <td>{{$reparacao->km}}</td>
                            </tr>

                            <tr>
                                <th>Observações</th>
                                <td>{{$reparacao->obs}}</td>
                            </tr>
                            
                            <tr>
                                <th>Veiculo</th>
                            <td><a href="/admin/veiculos/{{$reparacao->veiculo->id}}">{{$reparacao->veiculo->matricula}}</a></td>
                            </tr>
                      </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        </div>
        
        <div class="row justify-content-center">
            <!-- Detalhes da Reparação -->
            <div class="col-md-12">
                <div class="box box-default table-responsive">
                    <div class="box-header with-border">
                        Detalhes da Reparação
                    
                        <div class="pull-right box-tools ">   
                            <!-- Trigger the modal with a button -->
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal" title="Criar"><i class="fa fa-plus"></i></button>
                                <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Adicionar Detalhes</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" class="form-group" action="{{route('reparacoesdetails.store')}}">
                                                @csrf
                                                <input type="hidden" name="reparacao_id" id="reparacao_id" value="{{$reparacao->id}}">
                                                <div class="box-body">  
                                                    <div class="form-group">
                                            
                                                        <label>Tipo</label>
                                                        <select class="js-example-basic form-control" id="dynamic_id" name="dynamic_id"> 
                                                            <option value="">Selecione um...</option>
                                                    
                                                            @foreach($dynamic as $d)                                            
                                                                <option value="{{$d->id}}">{{$d->nome}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                                                                                                                    
                                                    <div class="form-group">
                                                        <label>Descrição</label>
                                                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Oleo 5w40">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Quantidade</label>
                                                        <input type="number" min="0.00"  step="0.01" class="form-control" id="qtd" name="qtd" placeholder="">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Preço</label>
                                                        <input type="number" min="0.00"  step="0.01" class="form-control" id="preco" name="preco" placeholder="">
                                                    </div>
                                            
                                                </div><!-- /.box-body -->
                            
                                                <div class="box-footer">
                                                    <button type="submit" class="btn btn-success">Guardar</button>
                                                </div>
                                            
                                            </form>    
                                        </div>
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                    
                                </div>     
                            </div>           
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                    
                        <table class="table table-bordered">
                            <tr>
                                <th class="text-center">Tipo</th>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Quantidade</th>
                                <th class="text-center">Preço</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Acções</th>
                            </tr>
                            
                            @foreach($reparacao->details()->get() as $details)
                            
                            <tr>
                                <td class="text-center">{{$dynamic->find($details->dynamic_id)->nome}}</a></td>
                                <td class="text-center">{{$details->nome}}</td>
                                <td class="text-center">{{$details->qtd}}</td>
                                <td class="text-right">{{$details->preco}} €</td>
                                <td class="text-right">{{$details->preco * $details->qtd}} €</td>
                                <td class="text-center">
                                    <div class="box-tools">
                                        <a href="#"><button type="button" class="btn btn-info btn-sm" data-widget="" data-toggle="tooltip" title=""><i class="fa fa-edit"></i></button></a>&nbsp;
                                        <a href="/admin/reparacoesdetails/{{$details->id}}"><button type="Submit" form="delete2" class="btn btn-danger btn-sm" data-widget="" data-toggle="tooltip" title=""><i class="fa fa-trash-o"></i></button></a>
                        
                                    <form method="POST" id="delete2" action="/admin/reparacoesdetails/{{$details->id}}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form>    
                                
                                </div>
                                </td>
                            </tr>
                            
                            <!-- calculo total -->
                            <input type="hidden" id="custId" name="custId" value=" {{$total = $total + ($details->preco * $details->qtd)}}">
                            
                            @endforeach
                            
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <th class="text-center">Total</th>
                                <td class="text-right">{{$total}} €</td>
                            </tr>
                            
                        </table>
                    </div><!-- /.box-body -->
                </div>
                <!-- /.box -->

                
            </div>

            

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->


</div>

@endsection