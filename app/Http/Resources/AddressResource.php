<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'street_name' => $this->street_name,
            'street_number' => $this->street_number,
            'zip_code' => $this->zip_code,
            'city_name' => $this->city_name,
            'country' => $this->country,
            'customer' => CustomerResource::collection([$this->customer]),
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-Y'),
            'deleted_at' => $this->deleted_at ? Carbon::parse($this->deleted_at)->format('d-m-Y') : null
        ];
        ;
    }
}
