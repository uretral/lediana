<?php

namespace App\Http\Livewire\Formats;

use App\Services\PrintoutSessionService;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class FormatLink extends Component
{
    public Collection $sizes;
    public string $size;
    public string $uri;
    public string $slug;
    public int $product_id;

    public array $test;
    public int $test2 = 0;

    public function goToEditor($item, PrintoutSessionService $sessionService)
    {
        redirect()->route('editor', [
            $this->slug,
            (int)$sessionService->get($item)->id
        ]);
    }

    public function render()
    {
        return view('livewire.formats.format-link');
    }
}
