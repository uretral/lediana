<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Models\Blocks\Reviews as BlockReviews;

class Reviews extends Component
{
    public int $take = 3;
    public int $page;
    public string $btn;

    public function render()
    {
        return view('livewire.reviews', [
            'reviews' => isset($this->page)
                ? BlockReviews::where('active', 1)->where('product_id', $this->page)->paginate($this->take)
                : BlockReviews::where('active', 1)->paginate($this->take)
        ]);
    }

    public function load()
    {
        $this->take += 3;
    }

}


