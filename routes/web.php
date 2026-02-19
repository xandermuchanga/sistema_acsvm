<?php

use App\Http\Controllers\AssemblyRecordController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CircularMaterialController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentReportController;
use App\Http\Controllers\DocumentVersionController;
use App\Http\Controllers\FiscalReviewController;
use App\Http\Controllers\LegalDocumentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectActivityPlanController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('projects', ProjectController::class);
Route::resource('activity-plans', ProjectActivityPlanController::class);
Route::resource('transactions', TransactionController::class);
Route::resource('department-reports', DepartmentReportController::class);
Route::resource('legal-documents', LegalDocumentController::class);
Route::resource('campaigns', CampaignController::class);
Route::resource('circular-materials', CircularMaterialController::class);
Route::resource('assembly-records', AssemblyRecordController::class);
Route::resource('fiscal-reviews', FiscalReviewController::class);
Route::resource('documents', DocumentVersionController::class);

Route::get('/reports/institutional', [DashboardController::class, 'institutionalReport'])->name('reports.institutional');
Route::get('/reports/financial', [DashboardController::class, 'financialReport'])->name('reports.financial');
