@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Criativos</div>
                <div class="card-body">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-9 control-label">Campanha</label>
                            <div class="col-sm-9">
                            <p class="form-control-static" id="campanha_id"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-9 control-label">Tipo de criativo</label>
                            <div class="col-sm-9">		            
                            <p class="form-control-static" id="tipo"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-9 control-label">Url de Redirecionamento</label>
                            <div class="col-sm-9">		            
                            <p class="form-control-static" id="urlRedirect"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-9 control-label">Url de Imagem</label>
                            <div class="col-sm-9">		            
                            <p class="form-control-static" id='urlImage'></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-9 control-label">Código do Cupom</label>
                            <div class="col-sm-9">		            
                            <p class="form-control-static" id="codCupom"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                            <a href="{{url('criativos/'.$criativo.'/edit')}}"><button class="btn btn-success">Editar</button></a>
                            <a href="{{url('criativos')}}"><button class="btn btn-primary">Retornar Para Listagem</button></a>
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
    url: "{{url('api/criativos/'.$criativo)}}",
    dataType: 'json',
    context: document.body
    }).done(function(e) {
        $('#campanha_id').append(e.campanha.nome);
        $('#tipo').append(e.tipo);
        $('#urlRedirect').append(e.urlRedirect);
        $('#urlImage').append(e.urlImage);
        $('#codCupom').append(e.codCupom);
    }).fail(function(e){
        console.log(e);
        alert('erro desconhecido');
    });
});
</script>
@endsection