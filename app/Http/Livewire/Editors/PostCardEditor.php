<?php

namespace App\Http\Livewire\Editors;

use App\Models\Printout\Printout;
use App\Services\PrintoutService;
use App\Traits\Editor\Cropper;
use App\Traits\Editor\CropperManager;
use App\Traits\Editor\CubeSpreadButton;
use App\Traits\Editor\CubeSpreadComposer;
use App\Traits\Editor\Delete;
use App\Traits\Editor\EventsSolver;
use App\Traits\Editor\FormatSelector;
use App\Traits\Editor\LayoutCoverMaterial;
use App\Traits\Editor\LayoutCoverThumbs;
use App\Traits\Editor\LayoutManager;
use App\Traits\Editor\LayoutSpreadThumbs;
use App\Traits\Editor\Orientation;
use App\Traits\Editor\Price;
use App\Traits\Editor\Save;
use App\Traits\Editor\SingleFileUploads;
use App\Traits\Editor\SpreadButtons;
use App\Traits\Editor\Texts;
use App\Traits\Editor\ToCart;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostCardEditor extends Component
{
    use WithFileUploads;

    // a-row
    use FormatSelector, Orientation, Save, Delete;

    //b-row
    use SpreadButtons;

    //c-row
    use CubeSpreadComposer, SingleFileUploads;

    //d-row
    use LayoutCoverMaterial, Price, ToCart;

    //e-row
    use LayoutSpreadThumbs, LayoutCoverThumbs, LayoutManager, Cropper, Texts, EventsSolver, CropperManager;

    protected $rules = [
        'printout.spread.attributes'
    ];

    protected $listeners = [
        'onImageSaveEvent',
        'onPhotoRemove',
        'onSetCoverLayout' => 'onSetCoverLayout',
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
        return view('livewire.editors.post-card-editor');
    }
}
