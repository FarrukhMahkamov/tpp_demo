<?php

namespace App\Http\Resources\Category;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'category_slug' => $this->cateogry_slug,
            'parent_cateogry_id' => $this->parent_cateogry_id ?? null,
            'created_at' => date_format($this->created_at, 'Y:m:d H:i:s'),
            'updated_at' => date_format($this->updated_at, 'Y:m:d H:i:s'),
            'sub_categories' => CategoryResource::collection($this->subCategory),
        ];
    }
}
