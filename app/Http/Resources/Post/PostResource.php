<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'id' => $this->id,
            'post_title' => $this->post_title,
            'post_body' => $this->post_body,
            'post_slug' => $this->post_slug,
            'category_id' => $this->category_id,
            'category_slug' => $this->category->category_slu,
            'created_at' => date_format($this->created_at, 'Y:m:d H:i:s'),
            'updated_at' => date_format($this->updated_at, 'Y:m:d H:i:s')
        ];
    }
}
