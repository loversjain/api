<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
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
            'discount'              =>  $this->discount,
            'link'                  =>  route('products.show',$this->id),
            'priceAfterDiscount'    =>  round((1- ($this->discount/100)) * $this->price,2),
            'star'                  =>  $this->reviews->count() > 0 ? round($this->reviews->sum('star')/
                                        $this->reviews->count(),3) : "Not rating yet"
        ];
    }
}
