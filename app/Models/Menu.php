<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'catergory',
        'points_value',
        'is_available',
        'created_by'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }
}
