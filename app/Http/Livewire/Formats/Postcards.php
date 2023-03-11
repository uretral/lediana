<?php

namespace App\Http\Livewire\Formats;

use App\Classes\Product\Product;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Postcards extends Component
{
    public \App\Models\Product\Product $product;
    public Collection $sizes;
    public string $type;
    public string $slug;

    public function mount() {
        $sizes = new Product($this->product->id);
        $this->sizes = $sizes->availableSizes();
    }

    public function render()
    {
        return view('livewire.formats.postcards');
    }
}
