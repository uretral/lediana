<?php

namespace App\Classes\Product;

use App\Models\Item\ItemSize;
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

    public function availableSizes(): Collection
    {
        return ItemSize::whereProductId($this->productId)->get();
    }

    public function calculator(): Collection
    {
        return ItemSize::whereProductId($this->productId)
            ->with(['format', 'fixed', 'spreadType',
                'cover.cover',
                'flyleaf', 'attributes',])
            ->get();
    }

}
