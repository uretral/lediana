<?php

namespace App\Http\Livewire;

use App\Traits\CalculatorMixin;
use Livewire\Component;

class Calculator extends Component
{
    use CalculatorMixin;


    public function mount()
    {
        $this->beforeMount();
        $this->size = $this->current->sizes;
        $this->covers = $this->current->cover;
        $this->calculate();
    }

    public function updated()
    {
        $this->current = $this->sizes->where('sizes', $this->size)->first();
        $this->calculate();
    }

    public function render()
    {
        return view('livewire.calculator');
    }

    public function goToEditor()
    {
        redirect()->to($this->uri.'/editor/'.$this->size);
    }
}
