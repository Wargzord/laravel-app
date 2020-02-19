@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Campanhas</div>

                <div class="card-body">
                    <form id="formPut" class="form-horizontal" method="post">
                        <div class="form-group">
                          <label for="inputName" class="col-sm-12 control-label">Nome da Campanha</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome" required>                            
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputName" class="col-sm-12 control-label">Data Inicial</label>
                          <div class="col-sm-12">
                            <input type="date" class="form-control" id="dataInicio" name="dataInicio" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputName" class="col-sm-12 control-label">Data Final</label>
                          <div class="col-sm-12">
                            <input type="date" class="form-control" id="dataFim" name="dataFim" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputName" class="col-sm-12 control-label">Valor da Comissão</label>
                          <div class="col-sm-12">
                            <input type="number" min="0" max="10000" step="0.01" class="form-control" id="valor" placeholder="Valor" name="valorComissao" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputName" class="col-sm-12 control-label">Gerente Responsável</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="gerente" placeholder="Nome do Gerente" name="gerente" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button id="btn-submit" type="submit" class="btn btn-success">
                                Salvar
                            </button>                            
                          </div>
                        </div>
                    </form>
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
        $('#nome').val(e.nome);
        $('#dataInicio').val(e.dataInicio);
        $('#dataFim').val(e.dataFim);
        $('#valor').val(e.valorComissao);
        $('#gerente').val(e.gerente);
    }).fail(function(e){
        console.log(e);
        alert('erro desconhecido');
    });

    $( "#formPut" ).submit(function( event ) {
        event.preventDefault();
        var formData = {
            "nome": $('#nome').val(),
            "dataInicio": $('#dataInicio').val(),
            "dataFim": $('#dataFim').val(),
            "valorComissao": $('#valor').val(),
            "gerente": $('#gerente').val(),
        };
        $.ajax({
            type: 'PUT', 
            url: "{{url('api/campanhas/'.$campanha)}}",
            data: formData, 
            dataType: 'json',
            encode: true
        }).done(function(response) {
            window.location.href = "{{url('campanhas/'.$campanha)}}";
        }).fail(function(response){
            console.log(response);
            alert('erro desconhecido');
        });
    });
});
</script>
@endsection