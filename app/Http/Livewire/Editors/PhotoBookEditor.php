<?php

namespace App\Http\Livewire\Editors;

use App\Http\Livewire\BaseComponent;
use App\Models\Layout\Layout;
use App\Models\Printout\Printout;
use App\Models\Printout\PrintoutCover;
use App\Services\PrintoutService;
use App\Traits\Editor\Cropper;
use App\Traits\Editor\CropperManager;
use App\Traits\Editor\EventsSolver;
use App\Traits\Editor\FileUploads;
use App\Traits\Editor\FormatSelector;
use App\Traits\Editor\LayoutCoverMaterial;
use App\Traits\Editor\LayoutCoverThumbs;
use App\Traits\Editor\LayoutManager;
use App\Traits\Editor\LayoutSpreadThumbs;
use App\Traits\Editor\Price;
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
    use FormatSelector;
    use SpreadButtons;
    use SpreadComposer, FileUploads;
    use LayoutCoverMaterial, Price;
    use LayoutSpreadThumbs,
        LayoutCoverThumbs, LayoutManager, Cropper, Texts, EventsSolver, CropperManager;
    use ToCart;

    public int $printout_id;
    public Printout $printout;
    public $tmpPhotos = [];
    public $photos = [];
    public $coverHeight = 300;
    protected const DEFAULT_TEMPLATE_ID = 3;

    // staff
    public int $timeStart = 0;
    public float $diff;
    public int $memory;
    public float $memoryDiff;

    /*
        public array $tpl = [
            0 => 'livewire.editors.editor',
            1 => 'livewire.editors.photo-book-editor',
            2 => 'livewire.editors.photo-book-editor',
            3 => 'livewire.editors.photo-editor',
            4 => 'livewire.photo-canvas-editor',
            5 => 'livewire.photo-cube-editor',
            6 => 'livewire.postcard-editor',
            7 => 'livewire.postcard-editor',
            9 => 'livewire.photo-magnet',
        ];*/

    protected $listeners = [
        'activeOddSpreadEvent' => 'activeOddSpreadEvent',
//        'activeOddSpreadEvent' => 'activeOddSpreadEvent',
        'activeEvenSpreadEvent' => 'activeEvenSpreadEvent',
        'onImageSaveEvent' => 'onImageSaveEvent',
        'onPhotoRemove' => 'onPhotoRemove',
        'getCoverWidth' => 'getCoverWidth',
        'onSetCoverLayout' => 'onSetCoverLayout',
    ];

    public function getCoverWidth($coverWidth)
    {
        $size = $this->printout->size;
        $this->coverHeight = $size->height / $size->width * $coverWidth;
    }


    public function booted()
    {
        // staff
//        $this->timeStart = floor(microtime(true) * 1000);
//        $this->memory = memory_get_usage();
    }

    private function staff()
    {
        $this->diff = (floor(microtime(true) * 1000) - $this->timeStart) / 1000;
        $this->memoryDiff = (memory_get_usage() - $this->memory) / 1024 / 1024;
    }

    public function preRender($service)
    {
        $this->printout = $service->get($this->printout_id);
    }

    public function render(PrintoutService $service)
    {
        $this->preRender($service);
        return view('livewire.editors.photo-book-editor');
    }
}
