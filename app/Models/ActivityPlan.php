<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityPlan extends Model
{
    protected $fillable = ['department', 'project_id', 'title', 'status', 'indicator', 'planned_value', 'executed_value', 'due_date'];
}
