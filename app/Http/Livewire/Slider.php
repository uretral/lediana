<?php

namespace App\Http\Livewire;

use App\Models\Content\Slide;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Slider extends Component
{
    public Collection $slides;


    public function mount()
    {
        $this->slides = Slide::all();
    }

    public function render(): View
    {
        return view('livewire.slider', ['slides' => $this->slides]);
    }
}
