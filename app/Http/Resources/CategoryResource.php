<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'slug'       => $this->slug,
            'posts_count' => $this->when(isset($this->posts_count), $this->posts_count),
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
