<?php

namespace App\Http\Livewire\Editors;

use App\Models\Printout\Printout;
use App\Services\PrintoutService;
use App\Traits\Editor\Cropper;
use App\Traits\Editor\Delete;
use App\Traits\Editor\FileUploads;
use App\Traits\Editor\FormatSelector;
use App\Traits\Editor\Orientation;
use App\Traits\Editor\Price;
use App\Traits\Editor\Save;
use App\Traits\Editor\SingleFileUploads;
use App\Traits\Editor\SingleSpreadButton;
use App\Traits\Editor\SingleSpreadComposer;
use App\Traits\Editor\SpreadButtons;
use App\Traits\Editor\ToCart;
use Livewire\Component;
use Livewire\WithFileUploads;

class PhotoEditor extends Component
{
    use WithFileUploads;

    // a-row
    use FormatSelector, Orientation, Save, Delete;

    //b-row
    use SingleSpreadButton;

    //c-row
    use SingleSpreadComposer, SingleFileUploads;

    //d-row
    use Price, ToCart;

    //e-row
    use Cropper;

    protected $rules = [
        'printout.spread.attributes'
    ];

    protected $listeners = [
        'onSingleSpreadAddRemove',
        'onImageSaveEvent' => 'onImageSaveEvent',
        'onImageRemove'
    ];

    public int $printout_id;
    public Printout $printout;
    protected PrintoutService $service;


    public $tmpPhotos = [];
    public $photos = [];
    public $coverHeight = 300;
    protected const DEFAULT_TEMPLATE_ID = 3;

    public $viewData = [];

    public $testMess = '';


    public function init(PrintoutService $service)
    {
        $this->printout = $service->get($this->printout_id);
        if (config('app.env') === 'local')
            $this->viewData = $this->printout->toArray();
    }

    public function render(PrintoutService $service)
    {
        $this->init($service);
        return view('livewire.editors.photo-editor', [
            'printout' => $this->printout
        ]);
    }
}

/*
 * boot
 * hydrate
 * booted
 * render
 * */

