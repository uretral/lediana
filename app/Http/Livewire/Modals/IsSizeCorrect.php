<?php

namespace App\Http\Livewire\Modals;

use App\Models\Item\ItemSize;
use App\Models\Printout\Printout;
use App\Services\PrintoutService;
use App\Services\PrintoutSessionService;
use Livewire\Component;

class IsSizeCorrect extends Component
{

    public string $subject = '';
    public string $formerSize = '';
    public string $currentSize = '';
    const KEY = 'printouts';
    public array $sessionStorage = [];
    public $layoutId = null;


    public bool $open = false;
    public ItemSize $itemSize;
    public Printout $printout;
    protected PrintoutService $printoutService;

    protected $listeners = [
        'onOpenIsSizeCorrectModal',
        'onIsSizeCorrectMount'
    ];

    public function close() {
        $this->open = false;
    }

    public function newSize(PrintoutService $printoutService) {
//        $this->printoutService = new PrintoutService();
        $printoutService->update($this->itemSize, $this->printout, $this->layoutId);
        $this->redirectToEditor($this->printout);
        $this->close();
    }

    public function formerSize() {
        $this->redirectToEditor($this->printout);
        $this->close();
    }

    public function redirectToEditor(Printout $printout) {
        redirect()->route('editor', [$printout->product->page->slug, $printout->id]);
    }

    public function checkSize(Printout $printout = null)
    {
        if ($printout && $printout->size_id === $this->itemSize->id) { // is same size - redirect to editor
            $this->redirectToEditor($printout);
        } elseif ($printout && $printout->size_id !== $this->itemSize->id) { // is another size - modal
            $this->subject = $printout->product->accusative;
            $this->formerSize = $printout->size->sizes;
            $this->currentSize = $this->itemSize->sizes;
            $this->printout = $printout;
            $this->open = true;
//            $this->redirectToEditor($printout);
        }
        else {
            dump('checkSize failed');
        }

    }

    public function isSessionPrintoutExist()
    {

        if (array_key_exists($this->itemSize->product_id, $this->sessionStorage)) {
            $this->checkSize(Printout::with(['product.page', 'size'])->find($this->sessionStorage[$this->itemSize->product_id]));
        } else {
            // create new
            $printout = $this->printoutService->create($this->itemSize, $this->layoutId);
            $this->sessionStorage[$printout->product_id] = $printout->id;
            session()->put(self::KEY, $this->sessionStorage);
            $this->redirectToEditor($printout);
        }
    }

    public function isUserPrintoutExist() {

    }


    public function onIsSizeCorrectMount(ItemSize $itemSize, $layoutId, PrintoutService $printoutService)
    {
//        dd('sasasasa', $itemSize, $layoutId, $printoutService);
        $this->sessionStorage = session()->has(self::KEY) ? session(self::KEY) : [];
        $this->printoutService = $printoutService;
        $this->itemSize = $itemSize;
        $this->layoutId = $layoutId;
        \auth()->user() ? $this->isUserPrintoutExist() : $this->isSessionPrintoutExist();
    }


    public function render()
    {
        return view('livewire.modals.is-size-correct');
    }
}
