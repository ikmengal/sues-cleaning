<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FacilityRoom extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function hasFacility(){
        return $this->hasOne(Facility::class, 'id', 'facility_id');
    }

    public function hasRoomType(){
        return $this->hasOne(RoomType::class, 'id', 'room_type_id');
    }
}
