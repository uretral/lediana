<?php

namespace App\Http\Livewire\Formats;

use App\Services\PrintoutSessionService;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class FormatLink extends Component
{
    public Collection $sizes;
    public $layout = null;
    public string $size;
    public string $uri;
    public string $slug;
    public int $product_id;
    public string $hint;

    public array $test;
    public int $test2 = 0;

    public function goToEditor($item, PrintoutSessionService $sessionService)
    {
        $params = [];
        $params[] = $this->slug;

        if($this->layout) {
            $params[] = (int)$sessionService->get($item, $this->layout)->id;
            $params[] = $this->layout;
        } else {
            $params[] = (int)$sessionService->get($item)->id;
        }

        redirect()->route('editor', $params);


        /*redirect()->route('editor', [
            $this->slug,
            (int)$sessionService->get($item)->id
        ]);*/
    }

    public function render()
    {
        return view('livewire.formats.format-link');
    }
}
