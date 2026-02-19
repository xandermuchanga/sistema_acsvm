<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CircularMaterial extends Model
{
    protected $fillable = ['material_type', 'quantity', 'unit', 'recorded_at', 'revenue_generated', 'buyer_partner'];
}
