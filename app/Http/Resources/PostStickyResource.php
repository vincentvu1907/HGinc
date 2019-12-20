<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostStickyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
   
    public function toArray($request)
    {
        // $sample = \App\Category::getParent($this->categories[0]->id);
        return [
            "title"=>$this->title,
            "description"=>$this->description,
            "url"=>$this->url,
            "thumbnail"=>$this->thumbnail,
        ];
    }
}
