<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $metrics = [
            'total_projects' => 24,
            'active_projects' => 11,
            'total_transactions' => 380,
            'approved_transactions' => 312,
            'completed_activities' => 145,
            'overdue_activities' => 19,
            'active_campaigns' => 7,
            'revenue_total' => 12950000,
            'expense_total' => 9730000,
        ];

        $charts = [
            'projects_by_status' => ['Planned' => 6, 'Active' => 11, 'Completed' => 5, 'Suspended' => 2],
            'revenue_vs_expense' => [
                'labels' => ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
                'revenue' => [1200000, 1550000, 1320000, 2100000, 1890000, 2100000],
                'expense' => [900000, 1250000, 980000, 1750000, 1620000, 1610000],
            ],
            'activities_plan_vs_done' => [
                'labels' => ['Q1', 'Q2', 'Q3', 'Q4'],
                'planned' => [40, 45, 52, 60],
                'done' => [35, 39, 0, 0],
            ],
            'campaigns_by_status' => ['Draft' => 2, 'Submitted' => 1, 'Approved' => 4, 'Archived' => 1],
        ];

        return view('dashboard.index', compact('metrics', 'charts'));
    }

    public function institutionalReport()
    {
        return response()->json(['message' => 'Estrutura pronta para exportação PDF e Excel do relatório institucional consolidado.']);
    }

    public function financialReport()
    {
        return response()->json(['message' => 'Estrutura pronta para exportação PDF e Excel do relatório financeiro mensal/anual.']);
    }
}
