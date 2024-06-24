<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // 'id' => isset($this->id) && !empty($this->id)?$this->id:'',
            // 'date' => date('l, d M', strtotime($this->date)),
            // 'day_date' => date('D d', strtotime($this->date)),
            // 'comment' => $this->comment,
            // // 'status' => $this->status==1?'Completed':'Pending',
            // 'user'=> isset($this->hasEmployee) && !empty($this->hasEmployee) ? new UserResource($this->hasEmployee) : null,
            // 'facility'=> isset($this->hasFacility) && !empty($this->hasFacility) ? new FacilityResource($this->hasFacility) : null,
            // 'room'=> isset($this->hasRoom) && !empty($this->hasRoom) ? new FacilityResource($this->hasRoom) : null,
            // 'rooms'=> isset($this->hasRooms) && !empty($this->hasRooms) ? new FacilityResource($this->hasRooms) : null,
            'id' => $this->id,
            'date' => date('l, d M', strtotime($this->date)),
            'day_date' => date('D d', strtotime($this->date)),
            'comment' => $this->comment,
            'extra_hours'=>$this->extra_hours,
            'user'=> isset($this->hasEmployee) && !empty($this->hasEmployee) ? new UserResource($this->hasEmployee) : null,
            'facility'=> isset($this->hasFacility) && !empty($this->hasFacility) ? new FacilityResource($this->hasFacility) : null,
            'room'=> isset($this->hasRoom) && !empty($this->hasRoom) ? new FacilityResource($this->hasRoom) : null,
        ];
    }
}
