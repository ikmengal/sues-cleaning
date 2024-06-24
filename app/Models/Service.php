<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function hasParentService() {
        return $this->hasOne(Service::class, 'id', 'parent_service_id');
    }

    public function haveSubServices(){
        return $this->hasMany(Service::class, 'parent_service_id', 'id');
    }
}
