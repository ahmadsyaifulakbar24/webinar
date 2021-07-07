<?php

namespace App\Http\Resources\Registration;

use App\Http\Resources\Param\ParamResource;
use App\Http\Resources\Training\TrainingResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RegistrationDetailResource extends JsonResource
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
            'training' => new TrainingResource($this->training),
            'user' => new UserResource($this->user),
            'role' => new ParamResource($this->role),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
