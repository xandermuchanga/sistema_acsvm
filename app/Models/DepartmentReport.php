<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentReport extends Model
{
    protected $fillable = ['department', 'period_type', 'year', 'workflow_status', 'activities_done', 'results', 'challenges', 'lessons_learned', 'recommendations'];
}
