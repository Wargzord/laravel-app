@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Criativos</div>

                <div class="card-body">
                    <form id="formPost" class="form-horizontal" method="post">
                        <div class="form-group">
                          <label for="campanha_id" class="col-sm-12 control-label">Campanha</label>
                          <div class="col-sm-12">
                            <select name="campanha_id" class="form-control" id="campanha_id" required>
                              <option value="">Selecione uma Campanha</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="tipo" class="col-sm-12 control-label">Tipo de criativo</label>
                          <div class="col-sm-12">
                            <select name="tipo" class="form-control" id="tipo" required>
                              <option value="">Selecione uma Opção</option>
                              <option value="texto">Link de Texto</option>
                              <option value="imagem">Banner de Imagem</option>
                              <option value="cupom">Cupom</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="urlRedirect" class="col-sm-12 control-label">Url de Redirecionamento</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="urlRedirect" placeholder="Url de Redirecionamento" name="urlRedirect" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="urlImage" class="col-sm-12 control-label">Url de Imagem</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="urlImage" placeholder="Url de Imagem" name="urlImage" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="codCupom" class="col-sm-12 control-label">Código do Cupom</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="codCupom" placeholder="Código do Cupom" name="codCupom">
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
    url: "{{url('/api/campanhas')}}",
    dataType: 'json',
    context: document.body
    }).done(function(e) {
        $(e).each(function (index, item) {
            var campanhaid = item.id;
            var nome = item.nome;
            $('#campanha_id').append('<option value="'+ campanhaid +'">'+ nome +'</option>')            
        });
    }).fail(function(e){
        console.log(e);
        alert('erro desconhecido');
    });

    $( "#formPost" ).submit(function( event ) {
        event.preventDefault();
        var formData = {
            "campanha_id": $('#campanha_id').val(),
            "tipo": $('#tipo').val(),
            "urlRedirect": $('#urlRedirect').val(),
            "urlImage": $('#urlImage').val(),
            "codCupom": $('#codCupom').val(),
        };
        $.ajax({
            type: 'POST', 
            url: "{{url('/api/criativos')}}",
            data: formData, 
            dataType: 'json',
            encode: true
        }).done(function(response) {
            window.location.href = "/criativos/" + response.id;
        }).fail(function(response){
            console.log(response);
            alert('erro desconhecido');
        });
    });
});
</script>
@endsection