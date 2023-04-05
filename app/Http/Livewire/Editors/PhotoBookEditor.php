<?php

namespace App\Http\Livewire\Editors;

use App\Http\Livewire\BaseComponent;
use App\Models\Layout\Layout;
use App\Models\Printout\Printout;
use App\Models\Printout\PrintoutCover;
use App\Services\PrintoutService;
use App\Traits\Editor\Cropper;
use App\Traits\Editor\CropperManager;
use App\Traits\Editor\Delete;
use App\Traits\Editor\EventsSolver;
use App\Traits\Editor\FileUploads;
use App\Traits\Editor\FormatSelector;
use App\Traits\Editor\LayoutCoverMaterial;
use App\Traits\Editor\LayoutCoverThumbs;
use App\Traits\Editor\LayoutManager;
use App\Traits\Editor\LayoutSpreadThumbs;
use App\Traits\Editor\Price;
use App\Traits\Editor\Save;
use App\Traits\Editor\SingleFileUploads;
use App\Traits\Editor\SingleSpreadButton;
use App\Traits\Editor\SpreadButtons;
use App\Traits\Editor\SpreadComposer;
use App\Traits\Editor\Texts;
use App\Traits\Editor\ToCart;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Request;
use Livewire\WithFileUploads;

class PhotoBookEditor extends BaseComponent
{
    use WithFileUploads;

    // a-row
    use FormatSelector, Save, Delete;

    //b-row
    use SpreadButtons;

    //c-row
    use SpreadComposer, SingleFileUploads;

    //d-row
    use LayoutCoverMaterial, Price, ToCart;

    //e-row
    use LayoutSpreadThumbs, LayoutCoverThumbs, LayoutManager, Cropper, Texts, EventsSolver, CropperManager;

    //m-row


    public int $printout_id;
    public Printout $printout;
    protected PrintoutService $service;
    public $tmpPhotos = [];
    public $photos = [];

    protected $listeners = [
        'onImageSaveEvent',
        'onPhotoRemove',
//        'getCoverWidth' => 'getCoverWidth',
        'onSetCoverLayout' => 'onSetCoverLayout',
        'onImageRemove'
    ];

/*    public function mount(PrintoutService $service) {
        $this->printout = $service->get($this->printout_id);
        $this->getButtonsProperty();
    }*/


    public function render(PrintoutService $service)
    {
        $this->printout = $service->get($this->printout_id);
//        dd($this->printout->toArray());
        return view('livewire.editors.photo-book-editor');
    }
}
