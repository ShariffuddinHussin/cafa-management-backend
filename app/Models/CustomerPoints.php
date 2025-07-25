<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPoints extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'total_points',
        'redeemed_points'
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
