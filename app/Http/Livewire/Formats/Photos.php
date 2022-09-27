<?php

namespace App\Http\Livewire\Formats;

use App\Classes\Product\Product;
use App\Http\Livewire\BaseComponent;
use Illuminate\Database\Eloquent\Collection;

class Photos extends BaseComponent
{

    public \App\Models\Product\Product $product;
    public Collection $sizes;
    public string $type;
    public string $slug;

    public function mount()
    {
        $sizes = new Product($this->product->id);
        $this->sizes = $sizes->availableSizes();
    }

    public function render()
    {
        return view('livewire.formats.photos');
    }
}
