<?php

namespace App\Http\Resources\Registration;

use App\Http\Resources\Param\ParamResource;
use App\Models\Registration;
use Illuminate\Http\Resources\Json\JsonResource;

class RegistrationUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $registration = Registration::find($this->pivot->id);
        return [
            'id' => $this->id,
            'unit' => new ParamResource($this->unit),
            'sub_unit' => new ParamResource($this->sub_unit),
            'poster_url' => $this->poster_url,
            'topic' => $this->topic,
            'date' => $this->date,
            'time' => $this->time,
            'description' => $this->description,
            'code' => $this->code,
            'status' => $this->status,
            'crated_at' => $this->crated_at,
            'updated_at' => $this->updated_at,
            'registration' => [
                'id' => $registration->id,
                'role' => new ParamResource($registration->role),
                'qrcode' => $registration->qrcode,
                'certificate' => $registration->certificate,
                'created_at' => $registration->created_at,
                'updated_at' => $registration->updated_at,
            ]
        ];
    }
}
