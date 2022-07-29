<?php

namespace App\Http\Resources\Other;

use Illuminate\Http\Resources\Json\JsonResource;

class GovermentSiteResource extends JsonResource
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
            "goverment_site_title" => $this->govermnet_site_title,
            "goverment_site_link" => $this->goverment_site_link,
            "goverment_site_file" => $this->goverment_site_file,
            'created_at' => date_format($this->created_at, 'Y:m:d H:i:s'),
            'updated_at' => date_format($this->updated_at, 'Y:m:d H:i:s')
        ];
    }
}
