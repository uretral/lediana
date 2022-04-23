<?php

namespace App\Http\Livewire;

use App\Models\Item\ItemSize;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Calculator extends Component
{

    public Product $product;
    public Collection $sizes;

    public function mount(){
        $this->sizes = ItemSize::whereProductId($this->id)->get();
    }

    public function render()
    {
        return view('livewire.calculator');
    }
}
