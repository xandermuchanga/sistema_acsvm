<!doctype html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGIS - ACSV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { background: #f4f6f9; }
        .sidebar { min-height: 100vh; background: #114b5f; }
        .sidebar a { color: #fff; text-decoration: none; display:block; padding: .65rem 1rem; }
        .sidebar a:hover { background: rgba(255,255,255,.15); }
        .topbar { background: #fff; border-bottom: 1px solid #dee2e6; }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <aside class="col-md-2 sidebar py-3">
            <h6 class="text-white px-3">SIGIS</h6>
            <a href="{{ route('dashboard') }}">Dashboard Executivo</a>
            <a href="{{ route('projects.index') }}">Projectos</a>
            <a href="{{ route('activity-plans.index') }}">Plano de Actividades</a>
            <a href="{{ route('transactions.index') }}">Administração e Finanças</a>
            <a href="{{ route('legal-documents.index') }}">Jurídico</a>
            <a href="{{ route('department-reports.index') }}">Relatórios Departamentais</a>
            <a href="{{ route('campaigns.index') }}">Marketing & Comunicação</a>
            <a href="{{ route('circular-materials.index') }}">Economia Circular</a>
            <a href="{{ route('assembly-records.index') }}">Assembleia Geral</a>
            <a href="{{ route('fiscal-reviews.index') }}">Conselho Fiscal</a>
            <a href="{{ route('documents.index') }}">Gestão Documental</a>
        </aside>
        <main class="col-md-10 px-0">
            <div class="topbar px-4 py-3 d-flex justify-content-between">
                <strong>Painel Institucional</strong>
                <span class="text-muted">Sem autenticação (fase 1)</span>
            </div>
            <div class="p-4">
                @yield('content')
            </div>
        </main>
    </div>
</div>
</body>
</html>
