<?php

namespace App\Http\Controllers;

class DepartmentReportController extends Controller
{
    public function index()
    {
        return view('department_reports.index');
    }
}
