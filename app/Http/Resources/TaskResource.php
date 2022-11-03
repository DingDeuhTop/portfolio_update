<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'image' => assert('/storage/' . $this->image),
            'skill' => $this->whenLoaded('skill'),
            'project' => $this->whenLoaded('project'),
            'owner' => $this->whenLoaded('owner')
        ];
    }
}
