<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'action',
        'description',
        'ip_address'
    ];

    // Relasi: log dimiliki oleh satu user (bisa null)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }
}
