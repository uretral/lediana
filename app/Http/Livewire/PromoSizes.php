<?php

namespace App\Http\Livewire;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class PromoSizes extends Component
{
    public bool $readyToLoad = false;

    public Product $product;
    public bool $byFormat;
    public Collection $sizes;
    public int $cnt = 0;

    public function mount(){
        $sizes = new \App\Action\Product\Product($this->product->id);
//       dd($sizes);
        $this->byFormat = $sizes->byFormat;
        $this->sizes = $sizes->sizes;
    }

    public function render()
    {
        return view('livewire.promo-sizes');
    }
}
