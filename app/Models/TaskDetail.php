<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hasParentService(){
        return $this->hasOne(Service::class, 'id', 'parent_service_id');
    }

    public function hasSubServices(){
        return $this->hasMany(Service::class, 'id', 'sub_service_id');
    }

    public function hasSubService(){
        return $this->hasOne(Service::class, 'id', 'sub_service_id');
    }
    
    public function hasServices()
    {
        return $this->hasMany(self::class, 'parent_service_id', 'parent_service_id')->where('name','=',$this->name);
    }
}
