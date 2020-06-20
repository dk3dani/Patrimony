@extends('adminlte::page')

@section('title', 'Fabricantes')

@section('content_header')
<h1 class="m-0 text-dark">Fabricantes</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p class="mb-0">
                    <a href="{{ route('manufacturer_form') }}" class="btn btn-default">Novo</a>
                    <hr>
                    @foreach($manufacturers as $manufacturer)
                    {{ $manufacturer->name }} -
                    <a href="{{ route('manufacturer_form_update', [
                                        'manufacturer' => $manufacturer->id
                               ]) }}" class="btn btn-default btn-xs">
                        Editar
                    </a>
                    <a onclick="return confirm('Deseja excluir este fabricante?')" href="{{ route('manufacturer_delete', [
                                        'manufacturer' => $manufacturer->id
                               ]) }}" class="btn btn-danger btn-xs">
                        Excluir
                    </a>
                    <br>
                    @endforeach
                </p>
            </div>
        </div>
    </div>
</div>
@stop
