<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
        // return parent::toArray($request);
        /* return [
            'name' => $this->name,
            'prive'=> $this->prive,
            'slug' => $this->slug
        ]; */
        return $this->resource->toArray();
    }
    public function with($request)
    {
        return ['extra_info' => 'Outra Informação extra'];
    }
}
