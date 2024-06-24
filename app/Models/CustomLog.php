<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CustomLog extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hasUser(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function hasFacility(){
        return $this->hasOne(Facility::class, 'id', 'facility_id');
    }

    public function hasRoom(){
        return $this->hasOne(FacilityRoom::class, 'id', 'room_id');
    }
}
