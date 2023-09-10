<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);
        return [
            'name_category' => $this->name_category,
            'parent' => $this->parent,
            'children' => CategoryResource::collection($this->whenLoaded('children')),
            'parentIs' => new CategoryResource($this->whenLoaded('parent'))
        ];
    }
}
