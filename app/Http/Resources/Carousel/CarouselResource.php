<?php

namespace App\Http\Resources\Carousel;

use Illuminate\Http\Resources\Json\JsonResource;

class CarouselResource extends JsonResource
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
            'carousel_title' => $this->carousel_title,
            'carousel_link' => $this->carousel_link,
            'carousel_number' => $this->carousel_number,
            'carousel_file' => $this->carousel_file,
            'created_at' => date_format($this->created_at, 'Y:m:d H:i:s'),
            'updated_at' => date_format($this->updated_at, 'Y:m:d H:i:s'),
        ];
    }
}
