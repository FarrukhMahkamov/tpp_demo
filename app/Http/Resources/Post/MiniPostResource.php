<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Resources\Json\JsonResource;

class MiniPostResource extends JsonResource
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
            "id" => $this->id,
            "post_title" => $this->post_title,
            "post_slug" => $this->post_slug,
            "created_at" => date_format($this->created_at, 'Y:m:d H:i'),
            "updated_at" => date_format($this->updated_at, 'Y:m:d H:i')
        ];
    }
}
