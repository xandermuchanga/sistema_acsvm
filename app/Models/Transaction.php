<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['project_id', 'type', 'status', 'category', 'currency', 'amount', 'payment_method', 'proof_file'];
}
