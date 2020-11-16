<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Category as CategoryResource;
use App\Http\Resources\TagCollection;

class Post extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {
        // return parent::toArray($request);
        return [
            'id'    => $this->id,
            'title' => $this->title,
            'slug'  => $this->slug,
            'featured_image_url' => $this->featured_image_url,
            'description' => $this->description,
            'body' => $this->body,
            'category' => new CategoryResource($this->whenLoaded('category')),
            'tags' => new TagCollection($this->whenLoaded('tags'))
        ];
    }
}
