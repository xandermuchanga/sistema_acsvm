<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LegalDocument extends Model
{
    protected $fillable = ['title', 'document_type', 'version', 'status', 'effective_date', 'file_path'];
}
