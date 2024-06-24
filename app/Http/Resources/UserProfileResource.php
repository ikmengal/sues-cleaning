<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'date_of_birth' => date('d M Y', strtotime($this->date_of_birth)),
            'phone_number' => $this->phone_number,
            'city' => $this->city,
            'profile' =>isset( $this->profile ) && !empty( $this->profile)  ?  asset('public/admin/assets/img/avatars/'.$this->profile) : asset('public/admin/default.png'),
        ];
    }
}
