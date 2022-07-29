<?php

namespace App\Http\Resources\Category;

use Illuminate\Http\Resources\Json\JsonResource;

class ActiveCategoryResource extends JsonResource
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
            'category_name' => $this->category_name,
            'category_slug' => $this->category_slug,
            'is_visable' => $this->is_visable,
            'create_at' => date_format($this->created_at, 'Y:m:d H:i:s'),
            'updated_at' => date_format($this->updated_at, 'Y:m:d H:i:s')
        ]; 
    }
}
