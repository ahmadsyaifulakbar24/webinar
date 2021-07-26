<?php

namespace App\Http\Resources\Training;

use App\Http\Resources\Param\ParamResource;
use App\Http\Resources\Registration\RegistrationResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TrainingRegistrationResource extends JsonResource
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
            'unit' => new ParamResource($this->unit),
            'sub_unit' => new ParamResource($this->sub_unit),
            'poster_url' => $this->poster_url,
            'topic' => $this->topic,
            'date' => $this->date,
            'time' => $this->time,
            'finish_date' => $this->finish_date,
            'description' => $this->description,
            'ttd' => $this->ttd,
            'code' => $this->code,
            'status' => $this->status,
            'theory' => $this->theory,
            'theory' => TheoryResource::collection($this->theory),
            'harkopnas' => ($this->created_at < '2021-07-19') ? 1 : 0,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'registration' => RegistrationResource::collection($this->registration),
        ];
    }
}
