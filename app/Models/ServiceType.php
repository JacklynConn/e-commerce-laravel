<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    use HasFactory;
    protected $table = "service_types";
    protected $fillable = [
        'name',
        'icon_code',
        'status',
    ];
    public function repairer()
    {
        return $this->hasMany(Repairer::class, 'servicetype_id', 'id');
    }
}
