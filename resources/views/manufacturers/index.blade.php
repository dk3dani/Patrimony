@extends('adminlte::page')

@section('title', 'Fabricantes')

@section('content_header')
<div class="row">
    <div class="col-6">
        <h1 class="m-0 text-dark">Fabricantes</h1>
    </div>
    <div class="col-6 text-right">
        <a href="{{ route('manufacturer_form') }}" class="btn btn-primary btn-sm">
            <i class="fa fa-plus"></i>
            Adicionar fabricante
        </a>
    </div>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Listagem de fabricantes</h3>
                <div class="card-tools">
                    <form action="{{ route('manufacturer') }}" method="GET" class="input-group input-group-sm"
                        style="width: 150px;">
                        <input type="text" name="name" class="form-control float-right" placeholder="Filtrar"
                            value="{{ request()->input('name') }}">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 70%">
                                Nome
                            </th>
                            <th class="text-right" style="width: 29%">
                                Ações
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($manufacturers as $manufacturer)
                        <tr>
                            <td>
                                #
                            </td>
                            <td>
                                {{ $manufacturer->name }}
                            </td>
                            <td class="text-right">
                                <a class="btn btn-info btn-sm" href="{{ route('manufacturer_form_update', [
                                            'manufacturer' => $manufacturer->id
                                   ]) }}?{{ request()->getQueryString() }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Editar
                                </a>
                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="manufacturerDelete('{{ route('manufacturer_delete', ['manufacturer' => $manufacturer->id]) }}')">
                                    <i class="fas fa-trash">
                                    </i>
                                    Excluir
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">
                                <div class="alert alert-info">Nenhum fabricante encontrado!</div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <hr>
                {{ $manufacturers->appends(request()->all())->links() }}
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@stop

@section('js')
<script>
    function manufacturerDelete(url) {
            swal({
                title: "Confirma a exclusão do fabricante?",
                icon: "warning",
                buttons: true,
            })
                .then((confirm) => {
                    if (confirm) {
                        $.ajax({
                            url,
                            method: 'delete',
                            beforeSend: function () {
                                swal("Aguarde!", {
                                    icon: "info",
                                });
                            },
                            success: function () {
                                swal("Fabricante excluído com sucesso!", {
                                    icon: "success"
                                }).then(() => {
                                    window.location.reload();
                                });
                            },
                            error: function () {
                                swal("Falha na exclusão!", {
                                    icon: "error",
                                });
                            }
                        })
                    }
                });
        }
</script>
@endsection
