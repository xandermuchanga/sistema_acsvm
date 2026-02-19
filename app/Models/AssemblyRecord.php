<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssemblyRecord extends Model
{
    protected $fillable = ['record_type', 'title', 'meeting_date', 'document_path'];
}
