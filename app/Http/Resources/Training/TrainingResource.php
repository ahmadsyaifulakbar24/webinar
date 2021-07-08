<?php

namespace App\Http\Resources\Training;

use App\Http\Resources\Param\ParamResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TrainingResource extends JsonResource
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
            'description' => $this->description,
            'code' => $this->code,
            'status' => $this->status,
            'crated_at' => $this->crated_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
