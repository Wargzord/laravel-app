@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Criativos</div>
                <div class="card-body">
                    <a href="{{url('criativos/create')}}" style="float: left; margin-bottom:15px;">
                        <button class="btn btn-primary btn-sm">Novo Criativo</button>
                    </a>
                    <table id="basic-datatables" class="table table-bordered table-content" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Tipo Criativo</th>
                            <th>Imagem</th>
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
    url: "api/criativos",
    dataType: 'json',
    context: document.body
    }).done(function(e) {
        $(e).each(function (index, item) {
            var criativoid = item.id;
            var tipo = item.tipo;
            var urlImage = item.urlImage;
            $('tbody#emp').append(
                '<tr><td>'+ criativoid + '</td><td><a href="criativos/' + criativoid + '">'
                + tipo + '</a></td><td>'+ urlImage + '</td><td>'
                + '<a href="/criativos/' + criativoid + '/edit" style="float: left;"><button class="btn btn-primary btn-sm">Editar</button></a>'
                + '<button data-id="'+ criativoid +'" style="margin-left: 15px;" class="btn btn-danger btn-sm btn-excluir">Excluir</button>'
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
            url: "/api/criativos/" + dataDelete,
            encode: true
        }).done(function(response) {
            window.location.href = "/criativos";
        }).fail(function(response){
            console.log(response);
            alert('erro desconhecido');
        });
    });
});
</script>
@endsection