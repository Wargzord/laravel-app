@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Campanhas</div>
                <div class="card-body">
                    <a href="{{url('campanhas/create')}}" style="float: left; margin-bottom:15px;">
                        <button class="btn btn-primary btn-sm">Nova Campanha</button>
                    </a>
                    <table id="basic-datatables" class="table table-bordered table-content" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th width="300px">Campanha</th>
                            <th width="200px">Gerente</th>
                            <th>Ações</th>
                          </tr>
                        </thead>
                        <tbody id="emp">
                        </tbody>
                    </table>
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
    url: "api/campanhas",
    dataType: 'json',
    context: document.body
    }).done(function(e) {
        $(e).each(function (index, item) {
            var campanhaid = item.id;
            var nome = item.nome;
            var gerente = item.gerente;
            $('tbody#emp').append(
                '<tr><td>'+ campanhaid + '</td><td><a href="campanhas/' + campanhaid + '">'
                + nome + '</a></td><td>'+ gerente + '</td><td>'
                + '<a href="/campanhas/' + campanhaid + '/edit" style="float: left;"><button class="btn btn-primary btn-sm">Editar</button></a>'
                + '<button data-id="'+ campanhaid +'" style="float: right;" class="btn btn-danger btn-sm btn-excluir">Excluir</button>'
                + '</td>')            
        });
    }).fail(function(e){
        console.log(e);
        alert('erro desconhecido');
    });

    $(document).on("click", ".btn-excluir", function( event ) {
        var dataDelete = $(this).data('id');
        $.ajax({
            type: 'DELETE', 
            url: "/api/campanhas/" + dataDelete,
            encode: true
        }).done(function(response) {
            window.location.href = "/campanhas";
        }).fail(function(response){
            console.log(response);
            alert('erro desconhecido');
        });
    });
});
</script>
@endsection