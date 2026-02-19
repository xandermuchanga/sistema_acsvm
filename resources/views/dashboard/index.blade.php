@extends('layouts.app')

@section('content')
<div class="row g-3 mb-3">
    @foreach($metrics as $label => $value)
        <div class="col-md-3">
            <div class="card shadow-sm"><div class="card-body">
                <small class="text-muted">{{ ucwords(str_replace('_', ' ', $label)) }}</small>
                <h4 class="mt-2">{{ is_numeric($value) ? number_format($value, 0, ',', '.') : $value }}</h4>
            </div></div>
        </div>
    @endforeach
</div>

<div class="row g-3">
    <div class="col-md-6"><div class="card"><div class="card-header">Projectos por Estado</div><div class="card-body"><canvas id="projectsChart"></canvas></div></div></div>
    <div class="col-md-6"><div class="card"><div class="card-header">Receita vs Despesa</div><div class="card-body"><canvas id="financeChart"></canvas></div></div></div>
    <div class="col-md-6"><div class="card"><div class="card-header">Actividades Planeadas vs Concluídas</div><div class="card-body"><canvas id="activitiesChart"></canvas></div></div></div>
    <div class="col-md-6"><div class="card"><div class="card-header">Campanhas por Estado</div><div class="card-body"><canvas id="campaignsChart"></canvas></div></div></div>
</div>

<script>
new Chart(document.getElementById('projectsChart'), {
    type: 'bar',
    data: { labels: @json(array_keys($charts['projects_by_status'])), datasets: [{ data: @json(array_values($charts['projects_by_status'])) }] }
});
new Chart(document.getElementById('financeChart'), {
    type: 'line',
    data: { labels: @json($charts['revenue_vs_expense']['labels']), datasets: [
        { label: 'Receita', data: @json($charts['revenue_vs_expense']['revenue']) },
        { label: 'Despesa', data: @json($charts['revenue_vs_expense']['expense']) }
    ] }
});
new Chart(document.getElementById('activitiesChart'), {
    type: 'bar',
    data: { labels: @json($charts['activities_plan_vs_done']['labels']), datasets: [
        { label: 'Planeadas', data: @json($charts['activities_plan_vs_done']['planned']) },
        { label: 'Concluídas', data: @json($charts['activities_plan_vs_done']['done']) }
    ] }
});
new Chart(document.getElementById('campaignsChart'), {
    type: 'doughnut',
    data: { labels: @json(array_keys($charts['campaigns_by_status'])), datasets: [{ data: @json(array_values($charts['campaigns_by_status'])) }] }
});
</script>
@endsection
