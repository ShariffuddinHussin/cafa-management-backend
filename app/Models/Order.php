<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'worker_id',
        'status',
        'total_amount',
        'point_earned',
        'completed_at'
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
    public function worker()
    {
        return $this->belongsTo(User::class, 'worker_id');
    }
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
