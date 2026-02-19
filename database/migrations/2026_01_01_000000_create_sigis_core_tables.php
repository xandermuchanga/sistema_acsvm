<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('status', ['Planned', 'Active', 'Completed', 'Suspended'])->default('Planned');
            $table->decimal('planned_budget', 14, 2)->default(0);
            $table->string('implementation_location')->nullable();
            $table->string('funder')->nullable();
            $table->text('partners')->nullable();
            $table->unsignedBigInteger('created_by')->nullable(); // pronto para RBAC
            $table->timestamps();
        });

        Schema::create('project_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->cascadeOnDelete();
            $table->string('title');
            $table->enum('status', ['Planned', 'In Progress', 'Completed', 'Cancelled'])->default('Planned');
            $table->date('planned_date')->nullable();
            $table->date('completed_date')->nullable();
            $table->string('indicator')->nullable();
            $table->timestamps();
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->nullable()->constrained('projects')->nullOnDelete();
            $table->enum('type', ['Revenue', 'Expense']);
            $table->enum('status', ['Draft', 'Submitted', 'Approved', 'Rejected', 'Paid'])->default('Draft');
            $table->string('category');
            $table->enum('currency', ['MZN', 'USD'])->default('MZN');
            $table->decimal('amount', 14, 2);
            $table->string('payment_method')->nullable();
            $table->string('proof_file')->nullable();
            $table->timestamps();
        });

        Schema::create('legal_documents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('document_type', ['Contract', 'MoU', 'Regulation', 'Policy', 'Letter', 'Template', 'License', 'Dispatch']);
            $table->string('version')->default('v1');
            $table->enum('status', ['Draft', 'Submitted', 'Approved', 'Archived'])->default('Draft');
            $table->date('effective_date')->nullable();
            $table->string('file_path')->nullable();
            $table->timestamps();
        });

        Schema::create('activity_plans', function (Blueprint $table) {
            $table->id();
            $table->string('department')->nullable();
            $table->foreignId('project_id')->nullable()->constrained('projects')->nullOnDelete();
            $table->string('title');
            $table->enum('status', ['Planned', 'In Progress', 'Completed', 'Cancelled'])->default('Planned');
            $table->string('indicator')->nullable();
            $table->integer('planned_value')->nullable();
            $table->integer('executed_value')->nullable();
            $table->date('due_date')->nullable();
            $table->timestamps();
        });

        Schema::create('department_reports', function (Blueprint $table) {
            $table->id();
            $table->string('department');
            $table->enum('period_type', ['Monthly', 'Quarterly', 'Annual']);
            $table->year('year');
            $table->enum('workflow_status', ['Draft', 'Submitted', 'Approved', 'Archived'])->default('Draft');
            $table->longText('activities_done')->nullable();
            $table->longText('results')->nullable();
            $table->longText('challenges')->nullable();
            $table->longText('lessons_learned')->nullable();
            $table->longText('recommendations')->nullable();
            $table->timestamps();
        });

        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->nullable()->constrained('projects')->nullOnDelete();
            $table->string('name');
            $table->string('target_audience')->nullable();
            $table->enum('status', ['Draft', 'Submitted', 'Approved', 'Archived'])->default('Draft');
            $table->integer('reach')->default(0);
            $table->integer('participants')->default(0);
            $table->timestamps();
        });

        Schema::create('circular_materials', function (Blueprint $table) {
            $table->id();
            $table->string('material_type');
            $table->decimal('quantity', 10, 2);
            $table->string('unit');
            $table->date('recorded_at');
            $table->decimal('revenue_generated', 14, 2)->default(0);
            $table->string('buyer_partner')->nullable();
            $table->timestamps();
        });

        Schema::create('assembly_records', function (Blueprint $table) {
            $table->id();
            $table->enum('record_type', ['Member', 'Minutes', 'Convocation', 'Resolution']);
            $table->string('title');
            $table->date('meeting_date')->nullable();
            $table->string('document_path')->nullable();
            $table->timestamps();
        });

        Schema::create('fiscal_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('review_date');
            $table->text('opinion');
            $table->longText('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('document_versions', function (Blueprint $table) {
            $table->id();
            $table->string('module');
            $table->string('title');
            $table->string('category');
            $table->string('version')->default('v1');
            $table->string('file_path')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->string('module');
            $table->string('action');
            $table->unsignedBigInteger('actor_id')->nullable(); // pronto para utilizador RBAC
            $table->json('payload')->nullable();
            $table->timestamp('logged_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
        Schema::dropIfExists('document_versions');
        Schema::dropIfExists('fiscal_reviews');
        Schema::dropIfExists('assembly_records');
        Schema::dropIfExists('circular_materials');
        Schema::dropIfExists('campaigns');
        Schema::dropIfExists('department_reports');
        Schema::dropIfExists('activity_plans');
        Schema::dropIfExists('legal_documents');
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('project_activities');
        Schema::dropIfExists('projects');
    }
};
