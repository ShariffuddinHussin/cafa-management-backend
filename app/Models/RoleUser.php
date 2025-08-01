<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory;
    protected $table = "role_user";
    protected $fillable = [
        'user_id',
        'role_id',
        'assigned_by'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function assigner()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }
}
