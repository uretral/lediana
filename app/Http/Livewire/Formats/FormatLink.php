<?php

namespace App\Http\Livewire\Formats;

use App\Models\Item\ItemSize;
use App\Models\Printout\Printout;
use App\Services\PrintoutSessionService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class FormatLink extends Component
{
    public Collection $sizes;
    public string $hint;



    public $layout = null;
    public string $size;
    public string $uri;
    public string $slug;
    public int $product_id;

    public int $formerSizeId;
    public string $formerSizeValue = '';

    public array $test;
    public int $test2 = 0;

    public $itemSize = null;

    public $modal = false;

    protected $listeners = [
        'onFormatLinkNewSize' => 'newSize',
        'onFormatLinkFormerSize' => 'formerSize'
    ];

    public function newSize(){
        dump('newSize',$this->itemSize);
    }
    public function formerSize(){
        dump('formerSize',$this->itemSize);
    }

    public function makeLink() {

    }


    public function goToEditor($item, PrintoutSessionService $sessionService)
    {

        $params = [];
        $params[] = $this->slug;
        $arrSizes = explode('×', $this->size);
        $size = ItemSize::where('width', $arrSizes[0])->where('height', $arrSizes[1])->first();

        if ($this->layout) {
            $params[] = (int)$sessionService->get($item, $this->layout, $size ? $size->id : null)->id;
            $params[] = $this->layout;
        } else {
            $params[] = (int)$sessionService->get($item, null, $size ? $size->id : null)->id;
        }

        redirect()->route('editor', $params);


    }

    public function authUser()
    {
        dd(' go to table');
    }

    public function sessionUser()
    {

    }


    public function handle(ItemSize $itemSize)
    {
        $this->emit('onIsSizeCorrectMount', $itemSize, $this->layout);
    }


    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.formats.format-link');
    }
}
