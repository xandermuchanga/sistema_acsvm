@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4 class="mb-0">Department reports</h4>
    <div>
        <button class="btn btn-sm btn-primary">Novo Registo</button>
        <button class="btn btn-sm btn-outline-danger">Exportar PDF</button>
        <button class="btn btn-sm btn-outline-success">Exportar Excel</button>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="row g-2 mb-3">
            <div class="col-md-4"><input class="form-control" placeholder="Pesquisa global"></div>
            <div class="col-md-3"><input class="form-control" placeholder="Filtro por estado"></div>
            <div class="col-md-3"><input class="form-control" placeholder="Filtro por período"></div>
        </div>
        <table class="table table-striped table-bordered">
            <thead><tr><th>#</th><th>Título</th><th>Estado</th><th>Actualizado</th><th>Acções</th></tr></thead>
            <tbody><tr><td>1</td><td>Exemplo de registo</td><td>Draft</td><td>{{ now()->format('d/m/Y') }}</td><td>Ver / Editar</td></tr></tbody>
        </table>
    </div>
</div>
@endsection
