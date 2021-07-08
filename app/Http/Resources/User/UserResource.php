<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'nik' => $this->nik,
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender,
            'agency' => $this->agency,
            'position' => $this->position,
            'address' => $this->address,
            'province' => $this->province,
            'city' => $this->city,
            'phone_number' => $this->phone_number,
            'photo_url' => $this->photo_url,
            'user_role' => $this->user_role,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
