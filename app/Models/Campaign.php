<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = ['project_id', 'name', 'target_audience', 'status', 'reach', 'participants'];
}
