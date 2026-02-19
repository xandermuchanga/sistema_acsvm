<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FiscalReview extends Model
{
    protected $fillable = ['title', 'review_date', 'opinion', 'notes'];
}
