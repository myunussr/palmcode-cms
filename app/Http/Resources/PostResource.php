<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'title'      => $this->title,
            'slug'       => $this->slug,
            'excerpt'    => $this->excerpt,
            'body'       => $this->body,
            'status'     => $this->status,
            'image_url'  => $this->image ? asset('storage/' . $this->image) : null,
            'created_at' => $this->created_at->toDateTimeString(),
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
        ];
    }
}
