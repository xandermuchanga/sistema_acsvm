<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectActivity extends Model
{
    protected $fillable = ['project_id', 'title', 'status', 'planned_date', 'completed_date', 'indicator'];
}
