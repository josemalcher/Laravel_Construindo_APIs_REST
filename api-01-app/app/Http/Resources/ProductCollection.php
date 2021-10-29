<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
         return [
             'data' => $this->collection,
             'extra'=> 'DADO Adicional'
       ];
    }
    public function with($request)
    {
        return ['extra_info' => 'Outra Informação extra'];
    }
}
