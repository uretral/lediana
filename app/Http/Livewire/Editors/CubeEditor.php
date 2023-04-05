<?php

namespace App\Http\Livewire\Editors;

use App\Models\Printout\Printout;
use App\Services\PrintoutService;
use App\Traits\Editor\Cropper;
use App\Traits\Editor\CubeSpreadButton;
use App\Traits\Editor\CubeSpreadComposer;
use App\Traits\Editor\Delete;
use App\Traits\Editor\FormatSelector;
use App\Traits\Editor\Modals\CubeModal;
use App\Traits\Editor\Orientation;
use App\Traits\Editor\Price;
use App\Traits\Editor\Save;
use App\Traits\Editor\SingleFileUploads;
use App\Traits\Editor\SingleSpreadComposer;
use App\Traits\Editor\ToCart;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

/**
 * @property mixed $spreadOddNr
 * @property mixed $spreadEvenNr
 */
class CubeEditor extends Component
{
    use WithFileUploads;

    // a-row
    use FormatSelector, Orientation, Save, Delete;

    //b-row
    use CubeSpreadButton;

    //c-row
    use CubeSpreadComposer, SingleFileUploads;

    //d-row
    use Price, ToCart;

    //e-row
    use Cropper, CubeModal;

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

    // for testing only
    public $viewData = [];
    public $viewOdd = [];
    public $viewEven = [];

    public function init(PrintoutService $service)
    {
        $this->printout = $service->get($this->printout_id);
        if (config('app.env') === 'local')
            $this->viewData =  $this->printout->toArray();
    }

    public function render(PrintoutService $service) : View
    {
        $this->init($service);
        return view('livewire.editors.cube-editor');
    }
}
