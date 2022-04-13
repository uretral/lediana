<?php

namespace App\Http\Livewire;

use App\Models\Blocks\PhotoTitle;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Gallery extends Component
{
    public Collection $galleries;
    public PhotoTitle $output;
    public int $current = 0;
    public string $page;

    public function mount($galleries)
    {
        $this->galleries = $galleries;
        $this->output = $this->galleries[$this->current];
    }

    public function show($current): PhotoTitle
    {
        $this->output = $this->galleries[$current];
        return $this->output;
    }

    public function render()
    {
        return view('livewire.gallery', ['output' => $this->output]);
    }

}
