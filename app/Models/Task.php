<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function hasEmployee(){
        return $this->hasOne(User::class, 'id', 'employee_id');
    }

    public function hasFacility(){
        return $this->hasOne(Facility::class, 'id', 'facility_id');
    }

    public function hasTaskDetails(){
        return $this->hasMany(TaskDetail::class, 'task_id', 'id');
    }

    public function hasTaskDetail(){
        return $this->hasOne(TaskDetail::class, 'task_id', 'id');
    }

    public function hasRoom(){
        return $this->hasOne(FacilityRoom::class, 'id', 'room_id');
    }
    
    public function hasRooms()
    {
        return $this->hasMany(self::class, 'facility_id', 'facility_id')->where('date','=',$this->date);
    }

    public function pictures()
    {
        return $this->hasMany(TaskPicture::class);
    }

    public function details()
    {
        return $this->hasMany(TaskDetail::class);
    }


}
