<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $status = 'Pending';
        if($this->status==1){
            $status = 'Completed';     
        }else{
            $status = 'Cancelled';    
        }
        
        return [
            'id' => $this->id,
            'main_service'=> isset($this->hasParentService) && !empty($this->hasParentService) ? new ServiceResource($this->hasParentService) : null,
            'sub_service'=> isset($this->hasSubService) && !empty($this->hasSubService) ? new ServiceResource($this->hasSubService) : null,
            'sub_services'=> isset($this->hasServices) && !empty($this->hasServices) ? new ServiceResource($this->hasServices) : null,
            'status' => $status,
            'comment' => $this->comment,
        ];
    }
}
