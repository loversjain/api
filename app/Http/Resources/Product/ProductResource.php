<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'                  =>  $this->name,
            'details'               =>  $this->details,
            'price'                 =>  $this->price,
            'afterDiscountPrice'    =>  round((1 -($this->discount/100)) * $this->price,3),
            'stock'                 =>  $this->stock == 0 ?  "Out Of stock" : $this->stock,
            'discount'              =>  $this->discount,
            'href'                  =>  ['reviews' =>route('reviews.index', $this->id)] ,
            'star'                  =>  $this->reviews->count() > 0 ? round($this->reviews->sum('star')/$this->reviews                        ->count(),2) : "No Rating yet" 
        ];
    }
}
