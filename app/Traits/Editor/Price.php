<?php

namespace App\Traits\Editor;

use \App\Models\Product\Price as AttributePrice;

trait Price
{
    public int $circulation = 1;
    public int $spreadPrice = 0;

    public array $attributes = [];
    public function updatedAttributes($newValue) {
        $this->printout->spread->update(['attributes' => $this->attributes]);
    }

    public function getPriceProperty()
    {
        $this->attributes = $this->printout->spread->attributes ?? [];
        $this->spreadPrice = $this->printout->prices->where('copies', '<=', $this->circulation)->first()->getAttribute('price');
        $this->printout->cost = $this->spreadPrice * $this->printout->spreads->count() + $this->attributesPrice();
        $this->printout->push();
        return $this->printout->cost;
    }

    public function attributesPrice(): int
    {
        $sum = 0;
        foreach ($this->attributes as $attributeId) {
            $sum += AttributePrice::find($attributeId)->getAttribute('price');
        }
        return $sum;
    }

}
