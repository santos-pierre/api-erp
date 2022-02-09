<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $datas = [
            'num_product' => $this->num_product,
            'name' => $this->name,
            'TVA' => $this->TVA,
            'HTVA_price' => ($this->price),
            'TVA_price' => price_TVA($this->price, $this->TVA),
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-Y'),
            'deleted_at' => $this->deleted_at ? Carbon::parse($this->deleted_at)->format('d-m-Y') : null
        ];

        if (Str::contains($request->getPathInfo(), 'commands')) {
            $datas['quantity'] = $this->pivot->quantity;
        }

        return $datas;
    }
}
