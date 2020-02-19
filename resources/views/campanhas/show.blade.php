@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Campanhas</div>
                <div class="card-body">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nome</label>
                            <div class="col-sm-9">
                            <p class="form-control-static" id="nome"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Data Inicial</label>
                            <div class="col-sm-9">		            
                            <p class="form-control-static" id="dataInicio"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Data Final</label>
                            <div class="col-sm-9">		            
                            <p class="form-control-static" id="dataFim"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Valor da Comissão</label>
                            <div class="col-sm-9">		            
                            <p class="form-control-static" id='valor'></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Gerente Responsável</label>
                            <div class="col-sm-9">		            
                            <p class="form-control-static" id="gerente"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                            <a href="{{url('campanhas/'.$campanha.'/edit')}}"><button class="btn btn-success">Editar</button></a>
                            <a href="{{url('campanhas')}}"><button class="btn btn-primary">Retornar Para Listagem</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(function(){
    $.ajax({
    url: "{{url('api/campanhas/'.$campanha)}}",
    dataType: 'json',
    context: document.body
    }).done(function(e) {
        $('#nome').append(e.nome);
        $('#dataInicio').append(e.dataInicio);
        $('#dataFim').append(e.dataFim);
        $('#valor').append(e.valorComissao);
        $('#gerente').append(e.gerente);
    }).fail(function(e){
        console.log(e);
        alert('erro desconhecido');
    });
});
</script>
@endsection