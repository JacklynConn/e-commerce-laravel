<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repairer extends Model
{
    use HasFactory;
    protected $table = "repairer";
    protected $fillable = [
        'servicetype_id',
        'name',
        'sex',
        'age',
        'phone',
        'like_id',
        'facebook',
        'status',
        'image',
        'email',
        'address',
        'details',
        'lat',
        'lng',
        'username',
        'password',
        'is_delete',
    ];
    public function servicetype()
    {
        return $this->belongsTo(ServiceType::class, 'servicetype_id', 'id');
    }
}
