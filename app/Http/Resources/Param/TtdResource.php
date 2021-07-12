<?php

namespace App\Http\Resources\Param;

use Illuminate\Http\Resources\Json\JsonResource;

class TtdResource extends JsonResource
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
            'unit' => $this->unit,
            'ttd_url' => $this->ttd_url,
        ];
    }
}
