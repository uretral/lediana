<?php

namespace App\Http\Livewire\Editors;

use App\Http\Livewire\BaseComponent;
use App\Models\Printout\Printout;

abstract class BaseEditor extends BaseComponent
{

    public int $printout_id;
    public Printout $printout;
    public $tmpPhotos = [];
    public $photos = [];


}
