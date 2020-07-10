@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
<div class="row">
    <div class="col-6">
        <h1 class="m-0 text-dark">Categorias</h1>
    </div>
    <div class="col-6 text-right">
        <a href="{{ route('category_form') }}" class="btn btn-primary btn-sm">
            <i class="fa fa-plus"></i>
            Adicionar categoria
        </a>
    </div>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Listagem de Categorias</h3>
                <div class="card-tools">
                    <form action="{{ route('category') }}" method="GET" class="input-group input-group-sm"
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
                        @forelse($categories as $category)
                        <tr>
                            <td>
                                #
                            </td>
                            <td>
                                {{ $category->name }}
                            </td>
                            <td class="text-right">
                                <a class="btn btn-info btn-sm" href="{{ route('category_form_update', [
                                            'category' => $category->id
                                   ]) }}?{{ request()->getQueryString() }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Editar
                                </a>
                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="categoryDelete('{{ route('category_delete', ['category' => $category->id]) }}')">
                                    <i class="fas fa-trash">
                                    </i>
                                    Excluir
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">
                                <div class="alert alert-info">Nenhuma categoria encontrado!</div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <hr>
                {{ $categories->appends(request()->all())->links() }}
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@stop

@section('js')
<script>
    function categoryDelete(url) {
            swal({
                title: "Confirma a exclusão da categoria?",
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
                                swal("Categoria excluído com sucesso!", {
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
