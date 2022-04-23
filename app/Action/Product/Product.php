<?php

namespace App\Action\Product;

use App\Models\Item\ItemSize;
use App\Models\Product\Price;
use Illuminate\Database\Eloquent\Collection;

class Product
{
    public int $productId;
    public Collection $sizes;
    public bool $byFormat = true;

    public function __construct($productId)
    {
        $this->productId = $productId;
    }

    public function availableSizes(){
        $this->sizes = Price::whereProductId($this->productId)
            ->where('prop_name','format')->with(['format', 'size'])
            ->get();
    }

    public function calculator(){
        $this->sizes = ItemSize::whereProductId($this->productId)
            ->with(['format', 'fixed', 'spreadType', 'cover', 'flyleaf', 'attributes',])
            ->get();
    }

}
